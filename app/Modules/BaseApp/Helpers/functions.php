<?php

use App\Imports\ProductsImport;
use App\Modules\BaseApp\BaseModel;
use App\Modules\Configs\Configs;
use App\Modules\GarbageMedia\GarbageMedia;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

if (! function_exists('urlLang')) {
    function urlLang($url, $fromlang, $toLang)
    {
        $currentUrl = str_replace('/' . $fromlang , '/' . $toLang , strtolower($url));
        return $currentUrl;
    }
}

if (! function_exists('getConfigs')) {
    function getConfigs()
    {
                $configs = Configs::with('translation')->get();
                $arr = [];
                if ($configs) {
                    foreach ($configs as $c) {
                        $key = $c->field;
                        $arr[$key] = $c->value;
                    }
                }
                return $arr;
    }
}

if (! function_exists('appName')) {
    function appName()
    {
//        $configs = getConfigs();
//        $appName = (@$configs['application_name']) ?? env('APP_NAME');
        return $appName =env('APP_NAME');
    }
}

if (! function_exists('welcomeMessage')) {
    function welcomeMessage()
    {
        $configs = getConfigs();
        $appName = (@$configs['welcome']) ?: env('APP_NAME');
        return $appName;
    }
}

if (! function_exists('getListOfFiles')) {
    function getListOfFiles($path)
    {
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') {
                continue;
            }
            if (is_dir($result)) {
                $out = array_merge($out, getListOfModel($path . '/' . $result));
            } else {
                $out[] = substr($result, 0, -4);
            }
        }
        return $out;
    }
}

if (! function_exists('splitString')) {
    function splitString($string , $from , $to)
    {
        if (!empty($string)){
          return  mb_substr(trim($string), $from, $to);
        }
        return ' ';
    }
}

if (! function_exists('hideEmail')) {
    function hideEmail($email)
    {
        return '****' . substr($email, 4);
    }
}

if (! function_exists('generateImage')) {
    function generateImage($text)
    {
        $url = 'https://ui-avatars.com/api/?name=' . $text . '&size=100';
        $contents = @file_get_contents($url);
        if ($contents) {
            $filename = strtolower(Str::random(10)) . time() . '.png';
            @file_put_contents(public_path() . '/uploads/small/' . $filename, $contents);
            return $filename;
        }
    }
}

if (! function_exists('export')) {
//        \Maatwebsite\Excel\Facades\Excel::create($module . "_" . date("Y-m-d H:i:s"), function ($excel) use ($data, $labels) {
//            $excel->sheet('Sheetname', function ($sheet) use ($data, $labels) {
//                $sheet->row(1, $labels);
//                $sheet->rows($data);
//                $sheet->row(1, function ($row) {
//                    // call cell manipulation methods
//                    $row->setFontWeight('bold');
//                });
//            });
//        })->export('xls');
//    }
}

if (! function_exists('getActivities')) {
    function getActivities($type = null)
    {
        $rows['nap'] = trans('activities.Nap');
        $rows['meal'] = trans('activities.Meal');
        $rows['note'] = trans('activities.Note');
        $rows['incident'] = trans('activities.Incident');
        $rows['bottle'] = trans('activities.Bottle');
        $rows['mood'] = trans('activities.Mood');
        $rows['medication'] = trans('activities.Medication');
        $rows['bathroom'] = trans('activities.Bathroom');
        $rows['learning'] = trans('activities.Learning');
        $rows['temperature'] = trans('activities.Temperature');
        $rows['feedback'] = trans('activities.Feedback');
        $rows['check_in'] = trans('activities.Check in');
        $rows['check_out'] = trans('activities.Check out');
        $rows['image'] = trans('activities.Image');
        if ($type) {
            return @$rows[$type];
        }
        return $rows;
    }
}

if (! function_exists('encodeRequest')) {
    function encodeRequest($request)
    {
        $array = [];
        foreach ($request as $k => $r) {
            if (is_array($r)) {
                $array[$k] = json_encode($r);
            } else {
                $array[$k] = $r;
            }
        }
        return $array;
    }
}

if (! function_exists('authorize')) {
    function authorize($action)
    {
        if (!can($action)) {
            return abort(403, 'Unauthorized action.');
        }
    }
}

if (! function_exists('can')) {
    function can($action)
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('super_admin')) {
                return true;
            }
            return auth()->user()->isAbleTo($action);
        } else {
            return redirect()->route('login');
        }
    }
}

if (! function_exists('canWithMultipleAction')) {
    function canWithMultipleAction($actionArr)
    {
        $user = auth()->user();
        $data = [];
        if (!$user) {
            if (!request()->header('token')) {
                return false;
            }
            $user = \App\Modules\Users\User::active()->first();
        }
        if ($actionArr) {
            foreach ($actionArr as $key => $action) {
                if ($user || $user->role_id) {
                    if ($user->super_admin || in_array($action, $user->role->permissions)) {
                        $data[$action] = true;
                    }
                } else {
                    $data[$action] = false;
                }
            }
            return $data;
        }
        return true;
    }
}

if (! function_exists('checkAllActions')) {
    function checkAllActions($actionArr)
    {
        $user = auth()->user();
        if ($actionArr) {
            foreach ($actionArr as $key => $action) {
                if ($user || $user->role_id) {
                    if ($user->super_admin || in_array($action, $user->role->permissions)) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}

if (! function_exists('getDefaultLang')) {
    function getDefaultLang()
    {
        if (in_array(request()->segment(1), langs())) {
            return LaravelLocalization::setLocale(request()->segment(1));
        } else {
            if (request()->segment(1) == '') {
                LaravelLocalization::setLocale(lang());
                return LaravelLocalization::setLocale(lang());
            } else {
                return LaravelLocalization::setLocale();
            }
        }
    }
}

if (! function_exists('lang')) {
    function lang()
    {
        return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
    }
}

if (! function_exists('langs')) {
    function langs()
    {
        $languages = (array_keys(config('laravellocalization.supportedLocales'))) ?: [];
        return $languages;
    }
}

if (! function_exists('randString')) {
    function randString($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }
}

if (! function_exists('code')) {
    function code()
    {
        return date('s') . date('m') . date('d') . date('y') . date('i') . date('H') . strtolower(Str::random(2));
    }
}

if (! function_exists('languages')) {
    function languages()
    {
        $languages = config('laravellocalization.supportedLocales');
        $langs = [];
        foreach ($languages as $key => $value) {
            $langs[$key] = $value['name'];
        }
        return $langs;
    }
}

if (! function_exists('transformValidation')) {
    function transformValidation($errors)
    {
        $temp = [];
        if ($errors) {
            foreach ($errors as $key => $value) {
                $temp[$key] = @$value[0];
            }
        }
        return $temp;
    }
}

if (! function_exists('image')) {
    function image($img, $type, $folder = 'uploads')
    {
        if (filter_var($img, FILTER_VALIDATE_URL) === FALSE && !empty($img)) {
            //TODO::handle has attach trait to upload in storage folder
            $src = app()->make("url")->to('/storage/') . '/' . $folder . '/' . $type . '/' . $img;
            return $src;
        }
        return $img;

    }
}
if (! function_exists('profile_picture')) {
    function profile_picture()
    {
        if (!empty(auth()->user()) && !empty(auth()->user()->profile_picture)){
           return image(auth()->user()->profile_picture , 'large');
        }
        return  url('assets/Admin/images/150.PNG');

//        return  'https://via.placeholder.com/150';
    }
}

if (! function_exists('viewImage')) {
    function viewImage($img, $type, $folder = 'uploads', $attributes = null)
    {
        if (!$folder) {
            $folder = 'uploads';
        }
        $width = 50;
        $height = 50;
        $class='';
        if ($attributes) {
            $height = @$attributes['height'] ?? 50;
            $width = @$attributes['width'] ?? 50;
            $class = @$attributes['image_class'];
            $id = @$attributes['id'];
        }
        $src = $folder . '/' . $type . '/' . $img;
        if (file_exists(public_path('storage/'.$src)) && !empty($img)) {
            $src = app()->make("url")->to('/storage/') . '/' . $src;
        } else {
            $src = 'https://via.placeholder.com/500x500';
        }

        return '<div class="'.$class.'" style="width:'. $width .'px;height:'.$height.'px;"><img  width="' . $width . '" height="' . $height . '"src="' . $src  . '" id="' . @$id . '" ></div>';
    }
}

if (! function_exists('viewFile')) {
    function viewFile($file, $folder = 'uploads')
    {
        $path = $folder . '/' . $file;
        if (!$file || !file_exists($path)) {
            return '';
        }
        return '<i class="fa fa-paperclip"></i> <a href="' . $path . '" >' . $file . '</a>';
    }
}

if (! function_exists('slug')) {
    function slug($str, $options = array())
    {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8');
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
        );
        // Merge options
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I',
            'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
            'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U',
            'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i',
            'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u',
            'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z',
            'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3',
            'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X',
            'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H',
            'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z',
            'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3',
            'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x',
            'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h',
            'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M',
            'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
            'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
            'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm',
            'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
            'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S',
            'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's',
            'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o',
            'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o',
            'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k',
            'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k',
            'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );
        // Make custom replacements
        $str = preg_replace(
            array_keys($options['replacements']),
            $options['replacements'],
            $str
        );
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        // Remove duplicate delimiters
        $str = preg_replace(
            '/(' . preg_quote($options['delimiter'], '/') . '){2,}/',
            '$1',
            $str
        );
        // Truncate slug to max. characters
        $str = mb_substr(
            $str,
            0,
            ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')),
            'UTF-8'
        );
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
}

if (! function_exists('pdf')) {
    function pdf($html, $filename)
    {
        // // or pure html
        $pdfarr = [
            'title' => $filename,
            'data' => $html, // render file blade with content html
            'header' => ['show' => false], // header content
            'footer' => ['show' => false], // Footer content
            'font' => 'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size' => 12, // font-size
            'text' => '', //Write
            'rtl' => (lang() == 'ar') ? true : false, //true or false
            // 'creator'=>'phpanonymous', // creator file - you can remove this key
            // 'keywords'=>'phpanonymous keywords', // keywords file - you can remove this key
            // 'subject'=>'phpanonymous subject', // subject file - you can remove this key
            'filename' => $filename . '.pdf', // filename example - invoice.pdf
            'display' => 'download', // stream , download , print
        ];
        return \PDFAnony::HTML($pdfarr);
    }
}

if (! function_exists('upload_image')) {
    function upload_image($img, $uploadPath = 'uploads')
    {
        //TODO::to be enhanced
        $image = request()->file($img);
        $fileName = strtolower(Illuminate\Support\Str::random(10)) . time() . '.' . $image->getClientOriginalExtension();
            //    dd($image , $uploadPath ,$fileName);
        request()->file($img)->move($uploadPath, $fileName);
        $filePath = $uploadPath . '/' . $fileName;
        if ($filePath) {
            $imageSizes = ['small' => 'resize,200x200', 'large' => 'resize,400x300'];
            foreach ($imageSizes as $key => $value) {
                $value = explode(',', $value);
                $type = $value[0];
                $dimensions = explode('x', $value[1]);
                if (!Illuminate\Support\Facades\File::exists($uploadPath . '/' . $key)) {
                    @mkdir($uploadPath . '/' . $key);
                    @chmod($uploadPath . '/' . $key, 0777);
                }
                $thumbPath = $uploadPath . '/' . $key . '/' . $fileName;
                $image = Intervention\Image\Facades\Image::make($filePath);
                if ($type == 'crop') {
                    $image->fit($dimensions[0], $dimensions[1]);
                } else {
                    $image->resize($dimensions[0], $dimensions[1], function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $image->save($thumbPath);
            }
            return $fileName;
        }
    }
}

if (! function_exists('nullArrayStringToNull')) {
    function nullArrayStringToNull(array $arr)
    {
        foreach ($arr as $key => $element) {
            $arr[$key] = strtolower($element) == "null" ? null : $element;
        }

        return $arr;
    }
}

if (! function_exists('nullStringToNull')) {
    function nullStringToNull(string $str)
    {
        return strtolower($str) == "null" ? null : $str;
    }
}

if (! function_exists('formatArrayOfLatLong')) {
    function formatArrayOfLatLong(array $array)
    {
        return array_map(function ($item) {
            $item = explode(' ', $item);
            return ['lat' => floatval($item[0]), 'lng' => floatval($item[1])];
        }, $array);
    }
}
if (! function_exists('unauthorize')) {
    function unauthorize()
    {
        return response()->json(
            [
                "errors" =>
                [[
                    'status' => '403',
                    'title' => 'Permission Denied',
                    'detail' => "You don't have permission"
                ]]
            ],
            403
        );
    }
}
if (!function_exists('extractLoggableAttributes')) {
    function extractLoggableAttributes($model) {
        $data = [];
        if ($model instanceof BaseModel) {
            $modelArray = $model->toArray();
            $loggableFields = $model->getLoggable();
            foreach ($modelArray as $key => $value) {
                if ($key == "translations") {
                    foreach ($value as $translation){
                        foreach ($translation as $key => $value) {
                            if (in_array($key , $loggableFields)){
                                $data[$key.":".$translation['locale']] = $value;
                            }
                        }
                    }
                } else {
                    if (in_array($key , $loggableFields)){
                        $data[$key] = $value;
                    }
                }
            }
        }
        return $data;
    }
}
if (! function_exists('normalizeNumbers')) {
    function normalizeNumbers($string) {
        // search stings
        $seachstrings = array("١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩", "٠");

        // replace strings
        $replacestrings= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        // replace function
        return str_replace($seachstrings , $replacestrings, $string);
    }
}

if (! function_exists('checkMobile')) {

    function checkMobile($value) {
        if ($value == '') {
            return true;
        }
        $value = normalizeNumbers($value);
        if (!trim($value) && intval($value) != 0) {
            return true;
        }
        return preg_match('/^\d+$/', $value) && strlen($value) == 11;
    }

}

if (!function_exists('convertGarbageIntoUploadedFile')) {
    /**
     * Convert garbage media model into uploaded images
     * @param integer $garbageMediaId
     * @return string  generated image name
     */
    function convertGarbageIntoUploadedFile($garbageMediaId, $largeSize = '1280x960', $smallSize = '800x450')
    {
        // get garbage media file name and path
        $media = GarbageMedia::find($garbageMediaId);
        $fileName = $media->filename;

        // file doesnt exists
        if (!Storage::exists($media->url)) {
            return;
        }

        // start manupilating the file
        $image = Image::make(Storage::get($media->url));

        // generate a unique name
        $newFileName = str_random(4) . $fileName;

        // string to array
        $smallDeminsions = explode('x', $smallSize);

        // generate large size
        $largeImage = $image->resize($image->width(), $image->height())->save(public_path('uploads/large/' . $newFileName));

        // generate small size
        $smallImage = $image->fit($smallDeminsions[0], $smallDeminsions[1])->save(public_path('uploads/small/' . $newFileName));

        // clean up the mess
        Storage::delete($media->url);
        $media->forceDelete();

        // return the file name
        return $newFileName;
    }
}

if (!function_exists('moveSingleGarbageMedia')) {
    function moveSingleGarbageMedia($id, string $storagePath = null)
    {
        $garbageMedia = GarbageMedia::find($id);
        $fileName = null;
        if ($garbageMedia) {
            if ($storagePath) {
                $fileName = $storagePath . '/' . $garbageMedia->filename;
            } else {
                $fileName = $garbageMedia->filename;
            }

//            if (in_array($garbageMedia->extension, getImageTypes())) {
                moveGarbageMediaSmallImage($garbageMedia, $fileName);
//            }
            \File::move(
                storage_path('app/public/garbage_media/' . $garbageMedia->filename),
                storage_path('app/public/uploads/large/' . $storagePath . '/' . $garbageMedia->filename)
            );
        }
        if ($garbageMedia) {
            $garbageMedia->delete();
        }
        return $fileName;
    }
}

if (!function_exists('moveGarbageMediaSmallImage')) {
    function moveGarbageMediaSmallImage($garbageMedia, $imgName)
    {
        if (\File::exists(storage_path('app/public/garbage_media/' . $garbageMedia->filename))) {
            $imageSizes = ['small' => 'resize,200x200'];
            foreach ($imageSizes as $key => $value) {
                $value = explode(',', $value);
                $type = $value[0];
                $dimensions = explode('x', $value[1]);
                $thumbPath = storage_path('app/public/uploads/' . $key . '/' . $imgName);
                $image = Intervention\Image\Facades\Image::make(storage_path('app/public/garbage_media/' . $garbageMedia->filename));
                if ($type == 'crop') {
                    $image->fit($dimensions[0], $dimensions[1]);
                } else {
                    $image->resize($dimensions[0], $dimensions[1], function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $image->save($thumbPath);
            }
        }
    }
}
if (!function_exists('uploadContentImage')) {
    function uploadContentImage($imagePath ,$imgName , $attachFieldsAttributes =null)
    {
        if (\File::exists($imagePath)) {
            if (!empty($attachFieldsAttributes['sizes'])){
                $imageSizes = $attachFieldsAttributes['sizes'];
            }else{
                $imageSizes = [
                    'large'  => 'resize,500x500',
                    'small' => 'resize,200x200'
                ];

            }
            foreach ($imageSizes as $key => $value) {
                $value = explode(',', $value);
                $type = $value[0];
                $dimensions = explode('x', $value[1]);
                $thumbPath = storage_path('app/public/uploads/' . $key . '/' . $imgName);
                $image = Intervention\Image\Facades\Image::make($imagePath);
                if ($type == 'crop') {
                    $image->fit($dimensions[0], $dimensions[1]);
                } else {
                    $image->resize($dimensions[0], $dimensions[1], function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $image->save($thumbPath);
            }
        }
        return TRUE;
    }
}
if (!function_exists('getImageTypes')) {
    function getImageTypes()
    {
        return [
            'jpeg',
            'png',
            'jpg',
            'gif',
            'svg'
        ];
    }
}

if (!function_exists('largePath')) {
    function largePath()
    {
        return storage_path('app/public/uploads/large');
    }
}
if (!function_exists('smallPath')) {
    function smallPath()
    {
        return storage_path('app/public/uploads/small');
    }
}



if (!function_exists('formatFilter')) {
    function formatFilter($data)
    {
        $arr = [];
        if (is_array($data) && count($data) > 0) {
            foreach ($data as $key => $value) {
                $obj = new \stdClass();
                $obj->key = $key;
                $obj->value = $value;
                $arr[] = $obj;
            }
        }
        return $arr;
    }
}
if (! function_exists('filterOptionsForPriceFilters')) {
    function filterOptionsForPriceFilters($list)
    {
        if (count($list)){
                $obj['from'] = $list[0]->translation->title;
                $obj['to'] = $list[1]->translation->title;
        }
        return $obj;
    }
}
if (! function_exists('filterOptionsForSizeFilters')) {
    function filterOptionsForSizeFilters($list)
    {
        $arr = [];
        if (count($list)){
            for ($i=0; $i<count($list); $i++){
                if ($i%2 == 0){
                    $obj['from'] = $list[$i]->translation->title;
                }else{
                    $obj['to'] = $list[$i]->translation->title;
                    $arr[]=$obj;
                    $obj=array();
                }
            }
        }
        return $arr;
    }
}
if (! function_exists('getSocialLinks')) {
    function getSocialLinks()
    {
        $arr=[];
        $configs = Configs::where('type', 'Social Links')->with('translation')->get();
        if (count($configs)){
            foreach ($configs as $recored){
                $arr[$recored->translation->label] = $recored->translation->value;
            }
        }
        return $arr;
    }
}
if (! function_exists('removeFromStorage')) {
    function removeFromStorage($path)
    {
         Storage::delete('public/uploads/large/'.$path);
         Storage::delete('public/uploads/small/'.$path);
    }
}
if (! function_exists('getUserCompletDataFlags')) {
    function getUserCompletDataFlags($user)
    {
        $compelet_basic_info =false;
        $compelet_working_info =false;
        $compelet_mortgage_info = false;

        // check compelet_basic_info
        if (isset($user->customer)) {
            if (!empty($user->gender_id)          && !empty($user->customer->marital_status) &&
                !empty($user->customer->nationality_id)    && !empty($user->customer->national_id)){
                $compelet_basic_info =true;
            }
        }
        // check compelet_working_info
        if (isset($user->customer)){
            if ($user->customer->work_type == 'corporate'){
                if (!empty($user->customer->job_title)          && !empty($user->customer->company_name) &&
                    !empty($user->customer->company_address)    && !empty($user->customer->employment_document) &&
                    !empty($user->customer->utility_bill)){
                    $compelet_working_info =true;
                }
            }elseif ($user->customer->work_type == 'employed'){
                if (!empty($user->customer->job_title)          && !empty($user->customer->company_name) &&
                    !empty($user->customer->company_address)    && !empty($user->customer->hr_document) &&
                    !empty($user->customer->net_income)         && !empty($user->customer->additional_monthly_income)){
                    $compelet_working_info =true;
                }
            }elseif ($user->customer->work_type == 'self_employed'){
                if (!empty($user->customer->job_title)          && !empty($user->customer->work_field) &&
                    !empty($user->customer->income_proof)){
                    $compelet_working_info =true;
                }
            }
        }

        // check compelet_mortgage_info
        if (!empty(request()->application_id)){
           $application =  \App\Modules\MortgageApplications\MortgageApplication::find(request()->application_id);
           if (!empty($application)){
               if (!empty($application->size)  && !empty($application->price) &&
                   !empty($application->property_type_id)){
                   if (empty($application->unit_id)){
                    if (!empty($application->unit_document)){
                        $compelet_mortgage_info = true;
                    }
                   }
                   $compelet_mortgage_info = true;
               }
           }
        }
         return [
             'compelet_basic_info'       => $compelet_basic_info,
             'compelet_working_info'     => $compelet_working_info,
             'compelet_mortgage_info'    => $compelet_mortgage_info,
             ];
    }
    if (! function_exists('uploadContents')) {
        function uploadContents()
        {
            dump('start insert content');
            try {
              // upload Products Content
                DB::table('products')->delete();
                DB::statement("ALTER TABLE products AUTO_INCREMENT = 1");
                $productSheet = app_path('Modules/Configs/Resources/productsToUpload.xlsx');
                Excel::import(new \App\Imports\ProductsImport(), $productSheet);
                dump('Import Products Done');

               // upload Teams Content
                DB::table('our_team')->delete();
                DB::statement("ALTER TABLE our_team AUTO_INCREMENT = 1");
                $teamtSheet = app_path('Modules/Configs/Resources/teamToUpload.xlsx');
                Excel::import(new \App\Imports\TeamImport(), $teamtSheet);
                dump('Import Teams Done');

                // upload Pages Content
                DB::table('pages')->delete();
                DB::statement("ALTER TABLE pages AUTO_INCREMENT = 1");
                $pagesSheet = app_path('Modules/Configs/Resources/pagesToUpload.xlsx');
                Excel::import(new \App\Imports\PagesImport(), $pagesSheet);
                dump('Import Pages Done');

                // upload Vission And Mission Content
                DB::table('vision_mission')->delete();
                DB::statement("ALTER TABLE vision_mission AUTO_INCREMENT = 1");
                $vissionAndMissiontSheet = app_path('Modules/Configs/Resources/vision_missionToUpload.xlsx');
                Excel::import(new \App\Imports\VisionAndMissionImport(), $vissionAndMissiontSheet);
                dump('Import Vission and Missions Done');


                // upload Ceo Statement Content
                DB::table('subsidiaries')->delete();
                DB::statement("ALTER TABLE subsidiaries AUTO_INCREMENT = 1");
                $ceoStatementSheet = app_path('Modules/Configs/Resources/ceostatementToUpload.xlsx');
                Excel::import(new \App\Imports\CeoStatementImport(), $ceoStatementSheet);
                dump('Import CEO Statement Done');

                // upload Shareholders Content
                DB::table('share_holders')->delete();
                DB::statement("ALTER TABLE share_holders AUTO_INCREMENT = 1");
                $shareholderSheet = app_path('Modules/Configs/Resources/shareholderToUpload.xlsx');
                Excel::import(new \App\Imports\ShareholderImport(), $shareholderSheet);
                dump('Import Shareholder Done');


                // upload Shareholders Images Content
                $shareholderImagesSheet = app_path('Modules/Configs/Resources/shareholderImagesToUpload.xlsx');
                Excel::import(new \App\Imports\ShareholderImagesImport(), $shareholderImagesSheet);
                dump('Import Shareholder Images Done');


                // upload Pages Content
                $optionsSheet = app_path('Modules/Configs/Resources/pagesInfoToUpload.xlsx');
                Excel::import(new \App\Imports\OptionsImport(), $optionsSheet);
                dump('Import Options Done');

                // upload Slider Content
                DB::table('sliders')->delete();
                DB::statement("ALTER TABLE sliders AUTO_INCREMENT = 1");
                $slidersSheet = app_path('Modules/Configs/Resources/bannarsToUpload.xlsx');
                Excel::import(new \App\Imports\SlidderImport(), $slidersSheet);
                dump('Import Slider Done');

            }catch (\Exception $exception) {
                dump($exception->getMessage());
                Log::error($exception->getMessage());
                return $exception->getMessage();
            }
            return 'in helper functions';
        }
    }
}
if (! function_exists('reArrangeIndex')) {
    function reArrangeIndex($current_index , $new_index , $skip_id , $model)
    {
        if ($current_index != $new_index){
            if ($current_index > $new_index){
                $model->where('index' , '>=' , $new_index)
                    ->where('index' ,'<' , $current_index)
                    ->where('id' , '!=' , $skip_id) // to skip this element
                    ->increment('index');
            }elseif($current_index < $new_index){
                $model->where('index' , '<=' , $new_index)
                    ->where('index' ,'>' , $current_index)
                    ->where('id' , '!=' , $skip_id)
                    ->decrement('index');
            }
        }
    }
}
if (! function_exists('checkUserNotificationSettingsFlag')) {
    function checkUserNotificationSettingsFlag($user_id)
    {
           $user = User::findOrFail($user_id);
           return $user->notification_flag;
    }
}



if (! function_exists('custome_response')) {
    function custome_response($code , $data , $message='' , $extra =[])
    {
        return [
            'code'      =>$code,
            'data'      =>$data,
            'message'   =>$message,
            'extra'     =>$extra
        ];
    }
}


       <ul>
                                        @forelse($errors->get('name') as $message)
                                            <li>
                                                <span class="text-danger"> {{$message}}</span>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                        </div>
                        <!--/ Form Field -->

                        <!-- Form Field -->
                        <div class="field-wrap">
                            <label>
                                E-ma
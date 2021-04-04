<template>
    <div>
        <li class="nav-item nav-search" >
            <a class="nav-link nav-link-search" v-on:click="openSearchInput">
                <i class="ficon" data-feather="search">

                </i>
            </a>
            <div :class="'search-input '+ searchInputFlag">
                <div class="search-input-icon">
                    <i data-feather="search"></i>
                </div>
                <input class="form-control input"
                       :placeholder="trans.search"
                       tabindex="-1"
                       type="text"
                       v-model="searchKey"
                >
                <div class="search-input-close" v-on:click="closeSearchInput">
                    <i data-feather="x"></i>
                </div>
                <ul class="search-list search-list-main ps ps__rtl show ps--active-y">
                    <div v-if="members.length">
                        <li class="d-flex align-items-center">
                            <a href="javascript:void(0);">
                                <h6 class="section-label mt-75 mb-0">{{ trans.users }}</h6>
                            </a>
                        </li>
                        <li class="auto-suggestion"
                            v-for="(user , index) in members" :key="index"
                        >
                            <a class="d-flex align-items-center
                        justify-content-between py-50 w-100"
                               :href="user.url">
                                <div class="d-flex align-items-center">
                                    <div class="avatar mr-75">
                                        <img :src="user.image"
                                             alt="png" height="32"></div>
                                    <div class="search-data">
                                        <p class="search-data-title mb-0">
                                            {{user.name}}
                                        </p>
                                        <small class="text-muted">{{ user.email }}</small>
                                        <br>
                                        <small class="text-muted">{{ user.mobile_number }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </div>
                    <div v-if="products.length">
                        <li class="d-flex align-items-center">
                            <a href="javascript:void(0);">
                                <h6 class="section-label mt-75 mb-0">{{trans.products}}</h6>
                            </a>
                        </li>
                        <li class="auto-suggestion" v-for="(product , index) in products"
                        :key="index">
                            <a class="d-flex align-items-center
                        justify-content-between py-50 w-100"
                               :href="product.one_product_url">
                                <div class="d-flex align-items-center">
                                    <div class="avatar mr-75">
                                        <img :src="product.image"
                                             alt="png" height="32"></div>
                                    <div class="search-data">
                                        <p class="search-data-title mb-0">
                                            {{ product.title }}
                                        </p>
                                        <small class="text-muted">{{ product.category }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </div>
                </ul>
            </div>
        </li>

    </div>
</template>

<script>
export default {
    data() {
        return {
            searchInputFlag: '',
            searchKey: '',
            products: [],
            members: [],
            trans: [],
        }
    },
    watch: {
        searchKey: function (newVal, oldVal) {
            if (newVal != '') {
                this.fetch()
            }
        }
    },
    props: ['user'],
    mounted() {
        this.init()
    },
    methods: {
        openSearchInput() {
            $(".app-content").addClass("show-overlay"),
            this.searchInputFlag = 'open'
        },
        closeSearchInput() {
            $(".app-content").removeClass("show-overlay"),
            this.searchInputFlag = ''
            this.products.length =0
            this.members.length =0
            this.searchKey =''
        },
        async fetch() {
            this.products.length =0
            this.members.length =0
            let url = '/api/v1/Basic/search/' + this.searchKey + '?user_id=' + this.user.id;
            await axios.get(url).then(response => {
                if (response.data.code === 200){
                    this.products = response.data.data.products
                    this.members = response.data.data.users
                    console.log(this.members)
                }
                else{
                    alert(response.data.message)
                }
            });
        },
        async init() {
            let url = '/api/v1/Basic/init/';
            await axios.get(url).then(response => {
                this.trans = response.data.trans

            });
        }
    }
}
</script>

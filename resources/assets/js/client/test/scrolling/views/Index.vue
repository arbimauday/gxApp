<template>
    <div class="container full-width container-fluid container-fixed-lg">
        <div class="row">
            <!-- START card -->
            <div class="card card-default bg-white">
                <div class="card-header">
                    <div class="col-md-12">
                        <div class="card-title">Tables Srcolling Vue</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">

                    <!-- Start Vue Scrolling -->
                    <div class="hacker-news-list">
                        <div class="hacker-news-header">
                            <a target="_blank" href="http://www.ycombinator.com/">
                                <img src="https://news.ycombinator.com/y18.gif">
                            </a>
                            <span>Hacker News</span>
                        </div>
                        <div class="hacker-news-item" v-for="(item, key) in list">
                            <span class="num" v-text="key + 1"></span>
                            <p>
                                <a target="_blank" :href="item.url" v-text="item.title"></a>
                            </p>
                            <p>
                                <small>
                                    <span v-text="item.points"></span>
                                    points by
                                    <a target="_blank" :href="'https://news.ycombinator.com/user?id=' + item.author" v-text="item.author"></a>
                                    |
                                    <a target="_blank" :href="'https://news.ycombinator.com/item?id=' + item.objectID" v-text="item.num_comments + ' comments'"></a>
                                </small>
                            </p>
                        </div>
                        <!-- Style loading -->
                        <infinite-loading @infinite="infiniteHandler">
                            <span slot="no-more">
                              There is no more Hacker News :(
                            </span>
                        </infinite-loading>
                        <!-- Style loading -->
                    </div>
                    <!-- End Vue Scrolling -->

                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    const api = 'http://hn.algolia.com/api/v1/search_by_date?tags=story';

    export default {
        data() {
            return {
                list: [],
            };
        },
        methods: {
            infiniteHandler($state) {
                // penggunaan ajax untuk menggunakan CrossDomain
                $.ajax({
                    crossDomain: true,
                    type: "GET",
                    url: api,
                    success: function (data) {
                        console.log(data)
                    }
                })
                 .then(data => {
                    if (data.hits.length) {
                        this.list = this.list.concat(data.hits);
                        $state.loaded();
                        console.log(this.list.length)
                        if (this.list.length / 20 === 10) {
                            $state.complete();
                        }
                    } else {
                        $state.complete();
                    }
                })
            },
        },
        components: {
            InfiniteLoading,
        },
    }
</script>
<template>
    <div id="page-speed">
        <div class="main-section">
            <div class="main-div">
                <div class="top-section">
                    <div class="wrapper">
                        <div class="logo-div">
                            <img src="" />
                        </div>
                        <div class="content-section">
                            <h1>PageSpeed Insights</h1>
                            <p>Enter a URL to test the load time of that page, analyze it and find bottlenecks.</p>
                        </div>
                    </div>
                </div>
                <div class="middle-section">
                    <div class="wrapper">
                        <input type="text" placeholder="Enter a web page URL"  v-model="pageUrl" required autofocus/>
                        <button @click="create">Analyze</button>
                    </div>
                </div>
                <div class="result-section" v-if="success">
                    <div class="wrapper">
                        <div class="download-btn">
                            <button>Download</button>
                        </div>
                        <div class="summary-block">
                            <p class="head">Summary</p>
                            <div class="left">
                                <div class="img-block">
                                    <img src="" />
                                </div>
                            </div>
                            <div class="right">
                                <div class="right-row">
                                    <div class="blog">
                                        <p class="top">Speed</p>
                                        <p class="middle red">Slow</p>
                                        <p class="bottom">
                                            <span>3.7s
                                                <span class="grey"> FCP</span>
                                            </span>
                                            <span>5.3s
                                                <span class="grey"> DCL</span>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="blog">
                                        <p class="top">Optimization</p>
                                        <p class="middle orange">Medium</p>
                                        <p>
                                            <span class="orange">77 </span> / 100</p>
                                    </div>
                                    <div class="blog">
                                        <p class="top">Resources</p>
                                        <p class="middle yellow">33</p>
                                    </div>
                                    <div class="blog">
                                        <p class="top">Resources</p>
                                        <p class="middle green">33</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="optimization-suggestions">
                            <p class="head">Optimization Suggestions</p>
                            <button class="accordion">
                                <span class="grade grade-b">B</span>Combine external JavaScript</button>
                            <div class="panel">
                                <p class="panel-head">Your page has 5 blocking script resources. This causes a delay in rendering your page.</p>
                                <p class="description">None of the above-the-fold content on your page could be rendered without waiting for the following
                                    resources to load. Try to defer or asynchronously load blocking resources, or inline the
                                    critical portions of those resources directly in the HTML.</p>
                                <ul>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                </ul>
                                <button>Example</button>
                            </div>

                            <button class="accordion">
                                <span class="grade grade-b">B</span>Remove query strings from static resources</button>
                            <div class="panel">
                                <p class="panel-head">Your page has 5 blocking script resources. This causes a delay in rendering your page.</p>
                                <p class="description">None of the above-the-fold content on your page could be rendered without waiting for the following
                                    resources to load. Try to defer or asynchronously load blocking resources, or inline the
                                    critical portions of those resources directly in the HTML.</p>
                                <ul>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                </ul>
                                <button>Example</button>
                            </div>

                            <button class="accordion">
                                <span class="grade">A</span>Leverage browser caching</button>
                            <div class="panel">
                                <p class="panel-head">Your page has 5 blocking script resources. This causes a delay in rendering your page.</p>
                                <p class="description">None of the above-the-fold content on your page could be rendered without waiting for the following
                                    resources to load. Try to defer or asynchronously load blocking resources, or inline the
                                    critical portions of those resources directly in the HTML.</p>
                                <ul>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                </ul>
                                <button>Example</button>
                            </div>

                        </div>
                        <div class="optimization-present">
                            <p class="head">Optimizations Already Present</p>
                            <button class="accordion">Download optimized image, JavaScript, and CSS resources for this page.</button>
                            <div class="panel">
                                <p class="panel-head">Your page has 5 blocking script resources. This causes a delay in rendering your page.</p>
                                <p class="description">None of the above-the-fold content on your page could be rendered without waiting for the following
                                    resources to load. Try to defer or asynchronously load blocking resources, or inline the
                                    critical portions of those resources directly in the HTML.</p>
                                <ul>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                    <li>
                                        <a href="#">https://tools.pingdom.com/_js/commonjs.bundle.js?v=c67c475724a05664377f1c330b54613395d60162</a>
                                    </li>
                                </ul>
                                <button>Example</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <p>© Copyrights Multidots solutions Pvt. Ltd.</p>
            </footer>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                pageUrl: '',
                id: '',
                success: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            create() {
                this.mute = true;
                window.axios.post('/api/page-speed', {pageUrl: this.pageUrl}).then(({ data }) => {
                    if (data.response.responseCode == 200) {
                        this.success = true;
                    }
                    this.id = data.id;
                });
            },
        },
    }
</script>

<style scoped>
    @import "css/style.css";
    @import "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css";
    @import "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css";
</style>

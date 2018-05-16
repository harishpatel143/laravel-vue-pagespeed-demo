<template>
    <div id="page-speed">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">Page Speed</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('page-speed') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Page URL') }}</label>
                                    <div class="col-md-6">
                                        <input id="text" type="text" class="form-control" name="url" value="" required autofocus>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            create() {
                this.mute = true;
                window.axios.post('/page-speed').then(({ data }) => {

                });
            },
        },
    }
</script>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Quote</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
</head>
<body>
<section class="hero is-light is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns is-desktop">
                <div class="column is-half is-offset-one-quarter">
                    <form method="get">
                        <div class="field">
                            <label class="label is-pulled-left">Цитата</label>
                            <div class="control">
                                <textarea name="text" class="textarea" placeholder="{{ $placeholder }}"
                                          autofocus></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-success is-medium">Сгенерировать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

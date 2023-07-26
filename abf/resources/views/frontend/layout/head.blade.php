<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="">

    <!-- Keywords -->
    @if (isset($og_tag) && $og_tag!='')
        <meta name="keywords" content="ABF Studio">
    @else
        <meta name="keywords" content="ABF Studio">
    @endif

    <!-- Description -->
    @if (isset($meta_description) && $meta_description!='')
        <meta name="description" content="{{ $meta_description }}">
    @else
        <meta name="description" content="ABF Studio">
    @endif

    <!-- Title  -->
    @if (isset($meta_title) && $meta_title!='')
        <title>{{ $meta_title }}</title>
    @else
        <title>ABF Studio</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/frontend/img/logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/plugins.css') }}">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/frontend/showcase/assets/css/showcases.css') }}">

    <script>document.documentElement.className = "js"; var supportsCssVars = function () { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e }; supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");</script>

</head>
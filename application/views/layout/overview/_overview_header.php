<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?> - Hutama Karya Toll Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" type="text/css" href="<?=base_url('assets/images/hk_logo.png')?>">
    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/simple-sidebar.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/mdb.min.css')?>" rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Orbitron');
        body {
          height: 768px;
          font-family: 'Orbitron', sans-serif;
          overflow: hidden;
          background-image: url(<?=base_url('assets/images/bg3.jpg')?>);
          background-size: cover;
        }
        .nav-link[data-toggle].collapsed:after {
            content: "▾";
        }
        .nav-link[data-toggle]:not(.collapsed):after {
            content: "▴";
        }
        .rotated { transform:rotate(180deg); -webkit-transform:rotate(180deg); -moz-transform:rotate(180deg); -o-transform:rotate(180deg); }
        .btn-floating {
          display: inline-block;
          position: absolute;
          z-index: 1000;
          /*font-weight: 400;*/
          text-align: center;
          white-space: nowrap;
          vertical-align: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          border: 1px solid transparent;
          /*padding: 2px;*/
          /*font-size: 1rem;*/
          line-height: 1.5;
          /*border-radius: 0.25rem;*/
          transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn-sm-floating {
          /*padding: 0.2rem 0.3rem;*/
          font-size: 0.875rem;
          /*line-height: 1.5;*/
          /*border-radius: 0.2rem;*/
        }
        .btn-secondary-floating {
          color: #fff;
          background-color: #6c757d;
          border-color: #6c757d;
          border-radius: 0px;   
        }

        .btn-secondary-floating:hover {
          color: #fff;
          background-color: #5a6268;
          border-color: #545b62;
        }

    </style>

</head>
<body>
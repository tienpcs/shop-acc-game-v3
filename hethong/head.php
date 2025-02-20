<head>
    <?php require_once('config.php');?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="<?=$bdtvl['favicon'];?>">
    <link rel="preload" as="image" href="<?=$bdtvl['logo'];?>"
        imagesizes="(max-width: 320px) 1000px, (max-width: 640px) 300px, (max-width: 768px) 600px, 800px"
        imagesrcset="<?=$bdtvl['logo'];?> 300w, <?=$bdtvl['logo'];?> 600w, <?=$bdtvl['logo'];?> 800w, <?=$bdtvl['logo'];?> 1000w, <?=$bdtvl['logo'];?> 1200w, <?=$bdtvl['logo'];?> 1600w, <?=$bdtvl['logo'];?> 2000w">
    <meta property="og:title" content="<?=$bdtvl['mo_ta'];?>">
    <meta property="og:description" content="<?=$bdtvl['key_words'];?>">
    <meta property="og:image" content="<?=$bdtvl['banner_web'];?>">
    <meta name="description" content="<?=$bdtvl['mo_ta'];?>">
    <meta name="image" content="<?=$bdtvl['banner_web'];?>">
    <link rel="stylesheet" href="/_nuxt/style.8a35440e.css">
    <link rel="prefetch" as="image" type="image/svg+xml" href="<?=$bdtvl['logo'];?>">
    <script type="module" src="/_nuxt/entry.37e7cf93.js" crossorigin></script>
    <!-- icon fontawesome -->
    <script src="https://kit.fontawesome.com/e7c05d7f02.js"></script>
    <!-- code.jquery.com -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <!-- theme thông báo -->
    <link href="<?=BASE_URL("assets/cute/cute-alert.css");?>" rel="stylesheet">
    <script src="<?=BASE_URL("assets/cute/cute-alert.js");?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    .end-flash-sale{
    z-index: 2000;
    background: rgba(255, 255, 255, 0.82);
}
.el-popper.is-light.el-popover.khanhdz {
  z-index: 2013;
  inset: 56px 279px auto auto;
  width: 210px;
  display: none;
}

@media (max-width: 1755px) {
  .el-popper.is-light.el-popover.khanhdz {
    inset: 56px auto auto auto;
  }
}

</style>

<style>
        .swiper-button-next,
        .swiper-button-prev {
            font-family: swiper-icons !important;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgb(255 255 255 / 47%);
            position: absolute;
            top: 55%;

            transform: translateY(-50%);
            z-index: 10;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .swiper:hover .swiper-button-next,
        .swiper:hover .swiper-button-prev {
            opacity: 1;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            content: 'next';
            font-size: 20px;
            color: white;
        }

        .swiper-button-prev::after {
            transform: rotate(180deg);
        }

        @media (max-width: 768px) {

            .swiper-button-next,
            .swiper-button-prev {
                font-family: swiper-icons !important;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background: rgb(255 255 255 / 47%);
                position: absolute;
                top: 65%;
                bottom: 50%;
                transform: translateY(-50%);
                z-index: 10;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                content: 'next';
                font-size: 15px;
                color: white;
            }
        }
    </style>
</head>
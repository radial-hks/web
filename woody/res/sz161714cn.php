<?php require_once('php/_lof.php'); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php EchoTitle(true); ?></title>
<meta name="description" content="<?php EchoMetaDescription(true); ?>">
<link href="../../common/style.css" rel="stylesheet" type="text/css" />
</head>

<body bgproperties=fixed leftmargin=0 topmargin=0>
<?php _LayoutLofTopLeft(true); ?>

<div>
<h1><?php EchoTitle(true); ?></h1>
<p><b>注意<?php EchoEstSymbol(); ?>和<?php EchoShortName(); ?>跟踪的指数其实不同, 只是成分相似, 此处估算结果仅供参考.</b></p>
<?php EchoAll(true); ?>
<p>相关软件:
<?php
    EchoBricSoftwareLinks(true);
    EchoASharesSoftwareLinks(true);
    EchoHSharesSoftwareLinks(true);
    EchoHangSengSoftwareLinks(true);
    EchoSpySoftwareLinks(true);
    EchoQqqSoftwareLinks(true);
    EchoCmfSoftwareLinks(true);
    EchoStockGroupLinks(true);
?>
</p>
</div>

<?php LayoutTailLogin(true); ?>

</body>
</html>

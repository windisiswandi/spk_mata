<HTML>
<HEAD>
<TITLE>Fungsi Date dengan 2 Argumen</TITLE>
</HEAD>
<BODY>
<font face="Arial" font color="#000" style='font-size: 8pt;'>
  <?php
    $sekarang = time();
    $nanti    = $sekarang + 24 * 60 * 60;
    print(date("d F Y",$sekarang) .
          "<BR>\n");
  ?>
  </font>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</BODY>
</HTML>



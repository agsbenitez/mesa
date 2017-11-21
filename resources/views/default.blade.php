<!--To put this html into an existing HTML document, you must copy the JavaScript and-->
<!--paste it in a specific location within the destination HTML document. You must then copy-->
<!--and paste the table in a different location.-->

<html>

<head>

<title>Inter-Com - Gesti�n de Municipios</title>

<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Fireworks Splice HTML">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>

</head>

<body bgcolor="#cccccc" onload="" topmargin="0" leftmargin="0" >
<script language="JavaScript">


    function Loguearse() {
        var cleft=160;
        var ctop=260;
        var direccion7

        direccion77 = '/HarGott/Municipios/Accesos/login.asp'
        var details77='status=no,menubar=no,resizable=no,scrollbars=no,left='+cleft+',top='+ctop+',width=450,height=230'
        hWnd77 = window.open(direccion77, 'MrChat77', details77);
    }

    //<!-- hide this script from non-javascript-enabled browsers

    /* Functions that finds images. */
    function MM_findObj(n, d) { //v3.0
        var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
            d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
        if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
        for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
    }
    /* Functions that swaps down images. */
    function MM_nbGroup(event, grpName) { //v3.0
        var i,img,nbArr,args=MM_nbGroup.arguments;
        if (event == "init" && args.length > 2) {
            if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
                img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
                if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
                nbArr[nbArr.length] = img;
                for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
                    if (!img.MM_up) img.MM_up = img.src;
                    img.src = img.MM_dn = args[i+1];
                    nbArr[nbArr.length] = img;
                } }
        } else if (event == "over") {
            document.MM_nbOver = nbArr = new Array();
            for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
                if (!img.MM_up) img.MM_up = img.src;
                img.src = (img.MM_dn && args[i+2]) ? args[i+2] : args[i+1];
                nbArr[nbArr.length] = img;
            }
        } else if (event == "out" ) {
            for (i=0; i < document.MM_nbOver.length; i++) {
                img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
        } else if (event == "down") {
            if ((nbArr = document[grpName]) != null)
                for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
            document[grpName] = nbArr = new Array();
            for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
                if (!img.MM_up) img.MM_up = img.src;
                img.src = img.MM_dn = args[i+1];
                nbArr[nbArr.length] = img;
            } }
    }

    // stop hiding -->
</script>
<div calss="container">

    <div class="row" background="#cccccc">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <table border="0" cellpadding="0" cellspacing="0" width="700">
                <!-- fwtable fwsrc="Default 800x600 Concepcion.png" fwbase="defaultRiachuelo.gif" -->
                <script language="JavaScript">
                    <!-- hide
                    if (document.images) {
                        defaultRiachuelo_r2_c2_f2 = new Image(158 ,47); defaultRiachuelo_r2_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r2_c2_f2.jpg";
                        defaultRiachuelo_r2_c2_f2 = new Image(158 ,47); defaultRiachuelo_r2_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r2_c2_f3.jpg";
                        defaultRiachuelo_r2_c2_f1 = new Image(158 ,47); defaultRiachuelo_r2_c2_f1.src = "imagesRiachuelo/defaultRiachuelo_r2_c2.jpg";
                        defaultRiachuelo_r4_c2_f2 = new Image(158 ,47); defaultRiachuelo_r4_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r4_c2_f2.jpg";
                        defaultRiachuelo_r4_c2_f2 = new Image(158 ,47); defaultRiachuelo_r4_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r4_c2_f3.jpg";
                        defaultRiachuelo_r4_c2_f1 = new Image(158 ,47); defaultRiachuelo_r4_c2_f1.src = "imagesRiachuelo/defaultRiachuelo_r4_c2.jpg";
                        defaultRiachuelo_r6_c2_f2 = new Image(158 ,47); defaultRiachuelo_r6_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r6_c2_f2.jpg";
                        defaultRiachuelo_r6_c2_f2 = new Image(158 ,47); defaultRiachuelo_r6_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r6_c2_f3.jpg";
                        defaultRiachuelo_r6_c2_f1 = new Image(158 ,47); defaultRiachuelo_r6_c2_f1.src = "imagesRiachuelo/defaultRiachuelo_r6_c2.jpg";
                        defaultRiachuelo_r8_c2_f2 = new Image(158 ,47); defaultRiachuelo_r8_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r8_c2_f2.jpg";
                        defaultRiachuelo_r8_c2_f2 = new Image(158 ,47); defaultRiachuelo_r8_c2_f2.src = "imagesRiachuelo/defaultRiachuelo_r8_c2_f3.jpg";
                        defaultRiachuelo_r8_c2_f1 = new Image(158 ,47); defaultRiachuelo_r8_c2_f1.src = "imagesRiachuelo/defaultRiachuelo_r8_c2.jpg";
                    }
                    // stop hiding -->
                </script>
                <tr>
                    <!-- Shim row, height 1. -->
                    <td><img src="imagesRiachuelo/shim.gif" width="134" height="1" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="158" height="1" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="408" height="1" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="1" border="0"></td>
                </tr>

                <tr valign="top"><!-- row 1 -->
                    <td colspan="3"><img name="defaultRiachuelo_r1_c1" src="imagesRiachuelo/defaultRiachuelo_r1_c1.jpg" width="700" height="182" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="182" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 2 -->
                    <td rowspan="8"><img name="defaultRiachuelo_r2_c1" src="imagesRiachuelo/defaultRiachuelo_r2_c1.jpg" width="134" height="268" border="0"></td>
                    <td><img name="defaultRiachuelo_r2_c2" src="imagesRiachuelo/defaultRiachuelo_r2_c2.jpg" width="158" height="47" border="0" usemap="#m_defaultRiachuelo_r2_c2"></td>
                    <td rowspan="8"><img name="defaultRiachuelo_r2_c3" src="imagesRiachuelo/defaultRiachuelo_r2_c3.jpg" width="408" height="268" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="47" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 3 -->
                    <td><img name="defaultRiachuelo_r3_c2" src="imagesRiachuelo/defaultRiachuelo_r3_c2.jpg" width="158" height="9" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="9" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 4 -->
                    <td><img name="defaultRiachuelo_r4_c2" src="imagesRiachuelo/defaultRiachuelo_r4_c2.jpg" width="158" height="47" border="0" usemap="#m_defaultRiachuelo_r4_c2"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="47" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 5 -->
                    <td><img name="defaultRiachuelo_r5_c2" src="imagesRiachuelo/defaultRiachuelo_r5_c2.jpg" width="158" height="9" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="9" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 6 -->
                    <td><img name="defaultRiachuelo_r6_c2" src="imagesRiachuelo/defaultRiachuelo_r6_c2.jpg" width="158" height="47" border="0" usemap="#m_defaultRiachuelo_r6_c2"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="47" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 7 -->
                    <td><img name="defaultRiachuelo_r7_c2" src="imagesRiachuelo/defaultRiachuelo_r7_c2.jpg" width="158" height="10" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="10" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 8 -->
                    <td><img name="defaultRiachuelo_r8_c2" src="imagesRiachuelo/defaultRiachuelo_r8_c2.jpg" width="158" height="47" border="0" usemap="#m_defaultRiachuelo_r8_c2"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="47" border="0"></td>
                </tr>
                <tr valign="top"><!-- row 9 -->
                    <td><img name="defaultRiachuelo_r9_c2" src="imagesRiachuelo/defaultRiachuelo_r09_c2.gif" width="158" height="52" border="0"></td>
                    <td><img src="imagesRiachuelo/shim.gif" width="1" height="52" border="0"></td>
                </tr>

                <map name="m_defaultRiachuelo_r2_c2">
                    <area shape="poly" coords="0,12,158,12,158,35,0,35,0,12" href="javascript:Loguearse()" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','defaultRiachuelo_r2_c2','imagesRiachuelo/defaultRiachuelo_r2_c2_f2.jpg','imagesRiachuelo/defaultRiachuelo_r2_c2_f3.jpg',1);"  onClick="MM_nbGroup('down','navbar1','defaultRiachuelo_r2_c2','imagesRiachuelo/defaultRiachuelo_r2_c2_f3.jpg',1);"  >
                </map>

                <map name="m_defaultRiachuelo_r4_c2">
                    <area shape="poly" coords="0,12,158,12,158,35,0,35,0,12" href="MesaDeEntradas" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','defaultRiachuelo_r04_c2','imagesRiachuelo/defaultRiachuelo_r04_c2_f2.jpg','imagesRiachuelo/defaultRiachuelo_r04_c2_f3.jpg',1);"  onClick="MM_nbGroup('down','navbar1','defaultRiachuelo_r04_c2','imagesRiachuelo/defaultRiachuelo_r04_c2_f3.jpg',1);"  >
                </map>

                <map name="m_defaultRiachuelo_r06_c2">
                    <area shape="poly" coords="0,12,158,12,158,35,0,35,0,12" href="Inventario.asp" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','defaultRiachuelo_r06_c2','imagesRiachuelo/defaultRiachuelo_r06_c2_f2.jpg','imagesRiachuelo/defaultRiachuelo_r06_c2_f3.jpg',1);"  onClick="MM_nbGroup('down','navbar1','defaultRiachuelo_r06_c2','imagesRiachuelo/defaultRiachuelo_r06_c2_f3.jpg',1);"  >
                </map>

                <map name="m_defaultRiachuelo_r08_c2">
                    <area shape="poly" coords="0,12,158,12,158,35,0,35,0,12" href="Personal.asp" onMouseOut="MM_nbGroup('out');"  onMouseOver="MM_nbGroup('over','defaultRiachuelo_r08_c2','imagesRiachuelo/defaultRiachuelo_r08_c2_f2.jpg','imagesRiachuelo/defaultRiachuelo_r08_c2_f3.jpg',1);"  onClick="MM_nbGroup('down','navbar1','defaultRiachuelo_r08_c2','imagesRiachuelo/defaultRiachuelo_r08_c2_f3.jpg',1);"  >
                </map>

                <!--   This HTML was automatically created with Macromedia Fireworks 3.0   -->
                <!--   http://www.macromedia.com   -->

            </table>


        </div>
        <div class="col-md-4"></div>




        <!-- Fireworks 3.0 Microsoft FrontPage target.
            Created Sat Mar 27 11:59:33 GMT-0300 (Hora est�ndar Sudam�rica E.) 2004 -->

        <!-------------------- BEGIN COPYING THE HTML HERE ------------------->


        <!--The following section is an image or HTML table which reassembles the sliced image in a browser.-->

<!--------------------------- STOP COPYING THE HTML HERE --------------------------->
    </div>
</div>
</body>

</html>


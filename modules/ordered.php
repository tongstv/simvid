<?php
class ordered extends Smarty
{
    function loadmore()
    {
        global $db;

        $sql = "select  sim1,sim2, giaban, mang FROM sim where sim2 LIKE '%" . substr(trim
            ($_GET['sosim']), -5, 5) . "' AND sim2!='" . trim($_GET['sosim']) . "' limit 30";
        $cache_key = md5($sql);
        $cache_path = "seo";
        $data = "";
        $data = cache($cache, null, "+1 day", "cache/" . $cache_path);


        $data = $db->fetch_all_array($sql);

        foreach ($data as $row) {


            $li .= '<li><a class="pull-left" href="/' . $row['sim2'] .
                '.html"><strong class="sim">' . $row['sim1'] .
                '</strong></a><span class="pull-right">' . number_format($row['giaban'] *
                1000000) . ' VNĐ</span></li>';
        }


        echo '<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">SIM SỐ ĐẸP GẦN GIỐNG SỐ BẠN ĐANG CHỌN</h3>
  </div>
  <div class="panel-body" style="margin: 0; padding: 0;">
  <ul id="lienquan">
 ' . $li . '
  </ul>
  </div>
</div>';


    }

    function done()
    {
        global $db;
        $this->setTemplateDir(TEMPLATE);



        if (isset($_POST['submit'])) {
            $addr[] = $_POST['address'];
            $addr[] = $_POST['px'];
            $addr[] = $_POST['qh'];

            unset($_POST['address']);
            unset($_POST['px']);
            unset($_POST['qh']);

            if (isset($_COOKIE['com'])) {

                $_POST['com_url'] = $_COOKIE['com_url'];
                $_POST['com_user'] = $_COOKIE['com_user'];
                $_POST['com_domain'] = $_COOKIE['com_domain'];
                $_POST['com_time'] = $_COOKIE['com_time'];
            }

            $_POST['address'] = @join(" - ", $addr);
            $sims = $_POST['sim'];
            unset($_POST['sim']);
            $simdlx = $_POST['simdlx'];
            unset($_POST['simdlx']);
            unset($_POST['submit']);
            $tt = 0;
            foreach ($sims as $key => $val) {
                $_POST['simdl'] = $simdlx[$key];
                $_POST['sosim'] = $key;
                $_POST['giatien'] = $val;


                $_POST['ip'] = $_SERVER['REMOTE_ADDR'];
                $_POST['date_order'] = time();
                if ($this->lc())
                    $adb = new db;


                $data[] = $_POST;

                $tt += $_POST['giatien'];

                $adb->query_insert("orders", $_POST);


            }
            $this->assign("data", $data);
            $this->assign("tt", isset($tt) ? $tt : "");
            $this->assign($_POST);

            $this->assign(getPage('dathangxong'));
            $this->display(temp_file);
        }

    }
    function index()
    {
        global $db, $seo;
        $this->setTemplateDir(TEMPLATE);

        $this->assign($seo);
        $_SERVER['HTTP_REFERER'] = 1;
        if (isset($_SERVER['HTTP_REFERER'])) {


            if (isset($_GET['cart'])) {

                $where = "WHERE sim2 IN('" . implode("', '", array_keys($_SESSION['mycart'])) .
                    "')";
            } else
                $where = "WHERE sim2='" . $_GET['sosim'] . "'";


            $result = $db->query("SELECT sim1, sim2, giaban, simdl FROM " . TABLE_SIM . " {$where}");
            $tt = 0;
            while ($row = $db->fetch_array($result)) {
                $tt += $row['giaban'];
                $row['doctien'] = doctien($row['giaban'] * 1000000);
                $data[] = $row;
            }

            $db->free_result($result);
        } else {
            $row = array();
            $sosim = $_GET['sosim'];
            $row['sim1'] = $sosim;
            $row['sim2'] = $sosim;
            $row['giaban'] = "Call";

            $data[] = $row;
        }

        $this->assign("data", $data);
        $this->assign("tt", isset($tt) ? $tt : "");

        $this->assign("mycart", isset($_SESSION['mycart']) ? $_SESSION['mycart'] : "");


        if ($this->lc()):


            $this->assign("city", getCity());
            $sosim = isset($_GET['sosim']) ? $_GET['sosim'] : "";
            $this->assign("sosim", $sosim);
            $pagedatmua = getPage('datmua');

            $pagedatmua['datmua']['title'] = str_replace('#sim#', $sosim, $pagedatmua['datmua']['title']);
            $pagedatmua['datmua']['detail'] = str_replace('#sim#', $sosim, $pagedatmua['datmua']['detail']);

            $this->assign($pagedatmua);
            $this->assign(str_replace('#sim#', $sosim, getPage('goimua')));
            $this->assign("thisdomain", thisdomain);
            $this->registerFilter("output", "minify_html");
            $this->display(temp_file);
        endif;
    }
    function mycartcount()
    {
        if (isset($_SESSION['mycart'])) {
            echo number_format(count($_SESSION['mycart']));
        }
    }
    function delmycart()
    {
        if (isset($_GET['id']) and !empty($_GET['id'])) {


            unset($_SESSION['mycart'][$_GET['id']]);


            $mycart = $_SESSION['mycart'];
            $tong = 0;
            $value = 0;
            if (isset($mycart)) {
                foreach ($mycart as $key => $value) {
                    if ($key == $_GET['id'])
                        continue;
                    $tong += $value;
                }
                if ($this->lc())
                    echo number_format($tong * 1000000);
            }

        }

    }
    function addmycart()
    {

    }
    function mycart()
    {
        $this->setTemplateDir(TEMPLATE);
        if (isset($_GET['add']) and !empty($_GET['add']) and !empty($_GET['gia'])) {
            if ($_GET['add'] != 'undefined')
                $_SESSION['mycart'][$_GET['add']] = $_GET['gia'];


        }


        $this->assign("mycart", (isset($_SESSION['mycart']) ? $_SESSION['mycart'] : ""));

        $this->assign("thisdomain", thisdomain);
        if ($this->lc())
            $this->display(temp_file);
    }
}

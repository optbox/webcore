<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Clusters</a></li>
    <li><a href="#tab2" data-toggle="tab">Activities</a></li>
    <?php           
        $sql = "<insert query here>";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }

        while( $rowtab = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $tab_class = ($rowtab['tab_title']==$current_tab) ? 'active' : '' ;
            $nospaces = str_replace(' ', '', $rowtab['tab_title']);
            echo '<li class="'.$tab_class.'"><a href="#' . urlencode($nospaces) .  '" data-toggle="tab">' .
            $rowtab['tab_title'] .  '</a></li>';
        }
        ?>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">
        Tab1 Content
    </div>
    <div class="tab-pane" id="tab2">
        Tab2 Content
    </div>
    <?php           
        $sql = "<insert query here>";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
            }

            while( $rowtab = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $tab = $rowtab['tab_title'];
            $nospaces = str_replace(' ', '', $rowtab['tab_title']);
            $content_class = ($tab==$current_tab) ? 'active' : '' ;
            echo '<div class="tab-pane'. $content_class.'" id="'.$nospaces.'">';
            echo 'You are looking at the '.$tab.' tab. Dynamic content will go here.';
            echo '</div><!-- /.tab-pane -->';
            }
            ?>
</div>

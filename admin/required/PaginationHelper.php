<?php

// THESE ARE GLOBAL VARIABLE DECLARATION. PLEASE DO NOT CHANGE IT.
$catchURL = "";        
$page = "";
$startLimit = 0;
$totalData = 0;
$pageCount = 0;
$contentsPerPage = 0;


// 1. CREATE PAGINATION FUNCTION WITH CONTENTS PER PAGE
function createPagination($fetchDataPerPage=6) {
    global $contentsPerPage;
    $contentsPerPage = $fetchDataPerPage;
}


// 2. FETCH DATA ACCORDING TO PAGE NUMBER
function fetchPagination($columns,$table,$whereOrJoin)
{
    // USE GLOBAL VARIABLES
    global $mysqli, $catchURL, $page, $startLimit, $totalData, $pageCount, $contentsPerPage; 
    
    // CLEANING URL FOR OTHER PAGES - $catchURL
    $catchURL = $_SERVER['REQUEST_URI'];
    $catchURL = preg_replace("/(\?|\&)page=[\d]+/", "", $catchURL);
    $query = parse_url($catchURL, PHP_URL_QUERY);

    if ($query) {
        $catchURL .= '&';
    } else {
        $catchURL .= '?';
    }

    // GET CURRENT PAGE NUMBER
    $page = (isset($_GET['page'])&&is_numeric($_GET['page'])) ? secure($_GET['page']) : 1;
    $startLimit = ($page-1)*$contentsPerPage;
    
    // GET TOTAL COUNT OF PAGES AND TOTAL CONTENT TO BE DISPLAYED 
    $sql = "SELECT COUNT(*) FROM $table $whereOrJoin";
    $countResult = $mysqli->query($sql);
    $rows = $countResult->fetch_row();
    $totalData = $rows[0];
    $pageCount = ceil($totalData/$contentsPerPage);

    // GET DATA
    $sql_main="SELECT $columns FROM $table $whereOrJoin LIMIT $startLimit,$contentsPerPage";
//    echo $sql_main;
    $result = $mysqli->query($sql_main);
    
    // RETURN ROWS OF NEEDED DATA
    if ($result->num_rows == 0) {
        return 0;
    } else {
        while ($row = $result->fetch_array()) {
            $rows[] = $row;
        }
//        $remove = array_shift($rows);
        return $rows;
    }
}

// 3. CREATE BOTTOM PAGE NUMBERS
// NOTE: This function should be called after fetchPagination() function
function pagination() 
{
     // USE GLOBAL VARIABLES
    global $catchURL, $page, $startLimit, $totalData, $pageCount, $contentsPerPage; 
    
    if($pageCount>1)
    {
        echo "<ul class='pagination pg-blue pagination-circle pagination-sm'>";
        $back = $page-1;
        $next = $page+1;
        if($page <= 1)
            echo "<li class='page-item '><a class='page-link' tabindex='-1'><i style='font-size: 20px;color:rgb(66,133,244);padding-right: 5px;' class='fas fa-arrow-circle-left'></i></a></li>";
        else
            echo "<li class='page-item '><a class='page-link' href='".$catchURL."page=$back' tabindex='-1'><i style='font-size: 20px;color:rgb(66,133,244);padding-right: 5px;' class='fas fa-arrow-circle-left'></i></a></li>";
        if($pageCount>7)
        {
            if($page<$pageCount-3&&$page>4)
            {
                echo "<li class='page-item'><a href='#' class='page-link'>...</a></li>";
                for ($i=$page-2;$i<=$page+2;$i++)
                {
                    if($i == $page)
                        echo "<li class='page-item active'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>";
                    else
                        echo "<li class='page-item'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>";        
                }
                echo "<li class='page-item'><a href='#' class='page-link'>...</a></li>";
            }
            elseif($page>4) {
                $start = ($page-7)+($pageCount-$page);
                echo "<li class='page-item'><a href='#' class='page-link'>...</a></li>";
                for($i=$start+2;$i<=$start+7;$i++)
                {
                    if($i == $page)
                        echo "<li class='page-item active'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>";
                    else
                        echo "<li class='page-item'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>"; 
                    }
                }
                elseif($page<=4) {
                    for($i=1;$i<=6;$i++)
                    {
                        if($i == $page)
                            echo "<li class='page-item active'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>";
                        else
                            echo "<li class='page-item'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>"; 
                        }
                echo "<li class='page-item'><a href='#' class='page-link'>...</a></li>"; 
            }
        }
        elseif($pageCount>1) {
            for($i=1;$i<=$pageCount;$i++)
            {
                if($i == $page)
                    echo "<li class='page-item active'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>";
                else
                    echo "<li class='page-item'><a href='".$catchURL."page=$i' class='page-link'>$i</a></li>";
            }
        }
    if ($page == ($pageCount))
        echo "<li class='page-item'><a class='page-link'><i style='font-size: 20px;color:rgb(66,133,244);padding-left: 5px;' class='fas fa-arrow-circle-right'></i></a></li>";
    else
        echo "<li class='page-item'><a href='".$catchURL."page=$next' class='page-link'><i style='font-size: 20px;color:rgb(66,133,244);padding-left: 5px;' class='fas fa-arrow-circle-right'></i></a></li>";    
    echo "</ul>";
    }
}
?>

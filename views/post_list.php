<article id="board_area">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <header>
        <h1> </h1>
    </header>
    <h1>방명록</h1>
    <h5>방명록을 남겨주세요:)</h5>

    <form id="search" method="post" action="/PostController/searchPost">
        <input type="text" name="searchWord" id="searchWord"/>
        <input type="submit" value="검색" id="searchBtn"/>
    </form>
    <button><a href="/PostController/writePost">글쓰기</a></button>
    <table id="list" cellpadding="0" cellspacing="15">
        <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">제목</th>
                <th scope="col">작성자</th>
                <th scope="col">작성일</th>
                <th scope="col">조회수</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = count($postList);
            foreach($postList as $lt)
            {
            ?>
            <tr>
                <th scope="row"><?=$i--?></th>
                <td>
                    <a
                        rel="external"
                        <?php
                        if($lt->private == 0){
                        ?>
                        href="/<?=$this->uri->segment(1);?>/viewPost/<?=$lt->id?>"
                        <?php } ?>
                        >
                        <?=$lt->title?>
                        
                        <?php
                        if($lt->private == 1){
                        ?>
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828415.png" width="15px" height="15px">
                        <?php
                        }
                        ?>
                    </a> 
                    <?php
                        if($lt->commentCount != 0){
                        ?>
                        <span id="color">[<?=$lt->commentCount?>]</span>
                        <?php
                         }
                        ?>
                </td>
                <td><?=$lt->name?></td>
                <td><?=$lt->date?></td>
                <td><?=$lt->views?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</article>

<script>
    $(document).ready(function() {
        $('#list').DataTable();
    } );
</script>
<style>
    a{
        text-decoration-line: none;
        color: #000000;
    }

    table{
        border : 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        margin : 10px;
    }

    tr {
        border-bottom: 1px solid #000000;
        padding: 10px;
        margin : 10px;
    }

    th, td{
        padding: 10px;
        margin : 10px;
    }

    #color{
        color : #9966CC;
    }
</style>
<article id="board_area">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<article id="board_area">
    <header>
        <h1> </h1>
    </header>
    <h1>게시글 검색</h1>
    <form id="search" method="post" action="/PostController/searchPost">
        <input type="text" name="searchWord" id="searchWord"/>
        <input type="submit" value="검색" id="searchBtn"/>
    </form>
    <h4> 검색어 [<span id="color"><?=$word?></span>]을/를 포함한 검색 결과입니다.</h4>
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
            <?php foreach($postList as $lt)
            {
            ?>
            <tr>
                <th scope="row"><?=$lt->id?></th>
                <td>
                    <a
                        rel="external"
                        <?php
                        if($lt->private == 0){
                        ?>
                        href="/<?=$this->uri->segment(1);?>/viewPost/<?=$lt->id?>"
                        <?php } ?>
                        >
                        <?=$lt->title?></a>
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
    #color{
        color : #9966CC;
    }
</style>
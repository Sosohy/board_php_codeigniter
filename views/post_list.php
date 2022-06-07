<article id="board_area">
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
    <table cellpadding="0" cellspacing="15">
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
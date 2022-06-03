<article id="board_area">
    <header>
        <h1> </h1>
    </header>
    <h1>방명록</h1>
    <h5>방명록을 남겨주세요:)</h5>

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
            <?php foreach($postList as $lt)
            {
            ?>
            <tr>
                <th scope="row"><?=$lt->id?></th>
                <td>
                    <a
                        rel="external"
                        href="/<?=$this->uri->segment(1);?>/viewPost/<?=$lt->id?>">
                        <?=$lt->title?></a>
                </td>
                <td><?=$lt->writer?></td>
                <td><?=$lt->date?></td>
                <td><?=$lt->views?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</article>
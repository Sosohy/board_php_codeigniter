<article id="board_area">
    <header>
        <h1> </h1>
    </header>
    <h1>방명록</h1>
    <table cellpadding="5" cellspacing="5">
        <thead>
            <tr><?=$post->title?></tr>
        </thead>
        <tbody>
            <tr>
                <td>작성자 <?=$post->writer?> | </td>
                <td><?=$post->date?> |</td>
                <td scope="col"><?=$post->views?> </td>
                <td scope="col"><button><a href="PostController/confirmUser/delete/<?=$post->id?>/<?=$post->writer?>">삭제</a></button></td>
                <td scope="col"><button><a href="PostController/confirmUser/modify/<?=$post->id?>/<?=$post->writer?>">수정</a></button></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <?=$post->content?>
    <hr>
</article>
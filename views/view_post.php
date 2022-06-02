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
                <td scope="col">삭제</td>
                <td scope="col">수정</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <?=$post->content?>
    <hr>
</article>
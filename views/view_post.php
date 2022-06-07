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
                <td>작성자 <?=$user->name?> | </td>
                <td><?=$post->date?> |</td>
                <td scope="col"><?=$post->views?> </td>
                <td scope="col"><button><a href="/PostController/confirmUser/delete/<?=$post->id?>/<?=$post->writer?>">삭제</a></button></td>
                <td scope="col"><button><a href="/PostController/confirmUser/modify/<?=$post->id?>/<?=$post->writer?>">수정</a></button></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <?=$post->content?>
    <hr>

    <form class="form-horizontal" method="post" action="" id="writeAction">
        <fieldset>
            <legend>댓글</legend>
            <table cellpadding="5" cellspacing="5">
                <tbody>
                    <tr>
                        <td>작성자</td> <td><input type="text" class="input-xlarge" id="name" name="name">
                        <td>비밀번호</td> <td><input type="password" class="input-xlarge" id="pw" name="pw">
                    </tr>
                    <tr>
                        <td>내용</td> <td><textarea class="input-xlarge" id="content" name="content"></textarea>
                    </tr>
                </tbody>
            </table>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" id="writeBtn">등록</button>
            </div>
        </fieldset> 
    </form>
</article>
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
    <p>댓글</p>
    <?php 
            foreach($commentList as $lt)
            {
            ?>
            <div id="comment">
                <?=$lt->name?> <?=$lt->date?>
                <input type="button" value="삭제" onClick="location.href='/PostController/confirmUser/commentDelete/<?=$post->id?>/<?=$lt->writer?>'"/>
                <br>
                <?php
                    if($lt->imgPath != NULL){
                ?>
                <img src="/img/<?=$lt->imgPath?>" width = 150px;/>
                <?php } ?>
                <br>
                <?=$lt->content?>
            </div>
            <?php
            }
            ?>
    <form class="form-horizontal" method="post" action="/PostController/writeComment/<?=$post->id?>" id="CommentAction" enctype="multipart/form-data">
        <fieldset>
            <table cellpadding="5" cellspacing="5">
                <tbody>
                    <tr>
                        <td>작성자</td> <td><input type="text" class="input-xlarge" id="name" name="name">
                        <td>비밀번호</td> <td><input type="password" class="input-xlarge" id="pw" name="pw">
                    </tr>
                    <tr>
                        <td>내용</td> <td><textarea class="input-xlarge" id="content" name="content"></textarea>
                        <input type="file" name="imgFile">
                    </tr>
                </tbody>
            </table>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" id="commentBtn">등록</button>
            </div>
        </fieldset> 
    </form>
    <hr>
</article>


<style>
 #comment{
        border: 1px solid black; 
        margin-top: 5px; 
        margin-bottom: 5px; 
        padding:10px;
        border-radius: 10px;
     }
</style>
<article id="board_area">
    <header>
        <h1> </h1>
    </header>

    <form class="form-horizontal" method="post" action="" id="confirmAction">
        <fieldset>
            <?php if($func == "delete"){ ?>
                <legend>게시글 삭제</legend>
                <p> 게시글 삭제 시 복구가 불가능합니다. </p>
            <?php }else{ ?>
                <legend>수정하기</legend>
            <?php }?>
           
            <p>글 정보</p>
            <table cellpadding="5" cellspacing="5">
                <tbody>
                    <tr>
                        <td>제목</td> <td><?=$post->title?></td>
                    </tr>
                    <tr>
                        <td>작성자</td> <td><?=$user->name?></td>
                    </tr>
                </tbody>
            </table>

            <p>글 작성시 설정한 비밀번호를 입력해주세요.</p>
            <table cellpadding="5" cellspacing="5">
                <tbody>
                    <tr>
                        <td>비밀번호</td> <td><input type="password" class="input-xlarge" id="pw" name="pw"></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-actions">
                <input type="button" onClick="history.back(1)" value="취소"/>
                <input type="submit" class="btn btn-primary" id="confirmUserPW" value="완료"/>  
            </div>
        </fieldset> 
    </form>
</article>




<!-- <div class="writeArea">
                <label for="title">제목</label>
                <input type="text" class="input-xlarge" id="title" name="title">
                <label for="content">내용</label>
                <textarea class="input-xlarge" id="content" name="content"></textarea>
</div> -->
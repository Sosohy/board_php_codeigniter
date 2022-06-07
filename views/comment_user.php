<article id="board_area">
    <header>
        <h1> </h1>
    </header>

    <form class="form-horizontal" method="post" action="" id="confirmAction">
        <fieldset>
            <h3>댓글을 삭제하시겠습니까?</h3>
            <p>삭제 시 복구가 불가능합니다. 글 작성시 설정한 비밀번호를 입력해주세요.</p>
            <p>글 작성시 설정한 비밀번호를 입력해주세요.</p>
            <p>비밀번호</p> 
            <input type="password" class="input-xlarge" id="pw" name="pw">
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
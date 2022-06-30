<article id="board_area">
    <header>
        <h1> </h1>
    </header>

    <form class="form-horizontal" method="post" action="" id="writeAction">
        <fieldset>
            <legend>글쓰기</legend>
            <table cellpadding="5" cellspacing="5">
                <tbody>
                    <tr>
                        <td>제목</td> <td><input type="text" class="input-xlarge" id="title" name="title">
                    </tr>
                    <tr>
                        <td>내용</td> <td><textarea class="input-xlarge" id="content" name="content"></textarea>
                    </tr>
                    <tr>
                        <td>작성자</td> <td><input type="text" class="input-xlarge" id="name" name="name">
                        <td>이메일(선택)</td> <td><input type="text" class="input-xlarge" id="email" name="email">
                    </tr>
                    <tr>
                        <td>비밀번호</td> <td><input type="password" class="input-xlarge" id="pw" name="pw">
                    </tr>
                    <tr>
                        <td>공개글 설정</td>
                        <td>
                        <input type="radio" name="private" value='0' checked="checked">공개글
                        <input type="radio" name="private" value='1'> 비밀글
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-actions">
                <input type="button" onClick="history.back(1)" value="취소"/>
                <input type="submit" class="btn btn-primary" id="writeBtn" value="완료"/>  
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
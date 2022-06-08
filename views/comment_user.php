<article id="board_area">
    <header>
        <h1> </h1>
    </header>
        <form class="form-horizontal" method="post" action="" id="confirmAction">
            <fieldset>
                <h3>댓글을 삭제하시겠습니까?</h3>
                <p>삭제 시 복구가 불가능합니다.</p>
                <p>글 작성시 설정한 비밀번호를 입력해주세요.</p>
                <p><b>비밀번호</b>
                <input type="password" class="input-xlarge" id="pw" name="pw" placeholder="비밀번호를 입력해주세요."/>
                </p> 
                <div class="form-actions">
                    <input type="button" onClick="history.back(1)" value="취소"/>
                    <input type="submit" class="btn btn-primary" id="confirmUserPW" value="완료"/>  
                </div>
            </fieldset> 
        </form>
</article>

<style>
    #board_area{
        margin : 0px; 
        padding : 0px;
        width : 100%;
        height : 100%;
        background-color : #A6A6A6;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #confirmAction{
        border-radius: 20px;
        left : 50%;
        width : 400px;
        height : 240px;
        padding : 0px;
        background-color: #ffffff;
        border : 0px;
    }

    fieldset{
        border : 0px;
        text-align: center;
    }

    #pw{
        border-radius : 5px;
        padding : 3px;
    }

    .form-actions input{
        border-radius: 5px;
        background-color : #ffffff;
        color : #9966CC;
        border-color : #9966CC;
    }
</style>


<!-- <div class="writeArea">
                <label for="title">제목</label>
                <input type="text" class="input-xlarge" id="title" name="title">
                <label for="content">내용</label>
                <textarea class="input-xlarge" id="content" name="content"></textarea>
</div> -->
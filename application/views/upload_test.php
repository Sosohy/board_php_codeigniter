<article id="board_area">
    <header>
        <h1> </h1>
    </header>
    <h1>이미지 업로드 테스트</h1>
    <form class="form-horizontal" method="post" action="/PostController/uploadImg" id="upload" enctype="multipart/form-data">
        <fieldset>    
            <input type="file" name="imgFile">
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" id="uploadBtn">등록</button>
            </div>
        </fieldset> 
    </form>
</article>

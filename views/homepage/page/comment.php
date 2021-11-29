<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }

    .rating,
    .comment {
        /* background-color: #fff; */
        border-radius: 15px;
        padding: 20px;
        box-shadow: -1px 5px 29px 5px rgb(0 0 0 / 10%);
        animation-fill-mode: forwards;
    }


    .rating_content {
        border: 1px solid #ccc;
        border-radius: 15px;
        padding: 5px
    }

    .write_comment {
        border-radius: 15px;
        border-color: #ccc;

    }

    .btn_comment {
        float: right;
    }

    .write_comment[placeholder] {
        padding: 14px
    }
</style>

<div class="container rating mb-3">
    <h5>Đánh giá & nhận xét + truyền tên sp</h5>
    <div class="rating_content d-flex justify-content-between ">
        <div class="stars flex-1">
            <form action="">
                <h6>hãy đánh giá sp</h6>
                <input class="star star-5" id="star-5" type="radio" name="star" />
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" />
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" />
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" />
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" />
                <label class="star star-1" for="star-1"></label>
            </form>
        </div>
        <div class="write_rating form-group">
            <textarea class="form-control" id="" name="" cols="60" rows="4" style="resize:none" placeholder="Hãy chia sẻ cảm nhận của bạn cho chúng t"></textarea>
            <button type="submit" class="write_rating_btn btn btn-danger mt-1">SEND</button>
        </div>
    </div>


</div>

<div class="container comment mb-3">
    <div class="comment-box-admin">
        <h5>Hỏi và đáp</h5>
        <textarea class="write_comment" id="" name="" cols="155" rows="4" style="resize:none" placeholder="Hãy chia sẻ cảm nhận của bạn cho chúng t"></textarea>
        <button type="submit" class="btn btn-danger btn_comment">send</button>
    </div>

    <div class="comment-list">
        <!-- <textarea class="write_comment" id="" name="" cols="160" rows="2" style="resize:none" readonly></textarea> -->
    </div>


</div>
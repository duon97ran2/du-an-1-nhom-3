<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Chi tieets comments</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">chi tiets comment</li>
            </ol>
        </div>
    </div>
</section>

<?php if (!empty(get_session('message'))) : ?>
    <div class="alert alert-success">
        <?= get_session('message') ?>
    </div>
    <?php remove_session('message') ?>
<?php endif; ?>

<div class="card card-default">

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    <th>STT</th>
                    <th>Nội dung</th>
                    <th>Người bình luận</th>
                    <th>Ngày bình luận</th>
                    <th>Admin rep </th>
                    <th width="180px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details_cmt as $key => $detail) : ?>
                    <tr>
                        <!-- <td><input type="checkbox" class="checkboxItem" name="checkbox" data-id="<?= $detail['comment_id'] ?>" id=""></td> -->

                        <td><?= $key + 1 ?></td>
                        <td><?= $detail['comment_content']  ?></td>
                        <td><?= $detail['name']  ?></td>
                        <td><?= $detail['created_at']  ?></td>
                        <td><?= $detail['comment_author'] ?></td>
                        <td>
                            <!-- <a href="<?= admin_url('comments/chi-tiet') ?>">DELETE</a> -->
                            <button onclick="deleteComment(<?= $detail['comment_id'] ?>)" class="table__controlBtn btn btn-danger">Xóa</button>
                            <a href="" class="btn btn-primary">Trả lời</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- <div class="control__manager">
    <button onclick="selectAll()" class="table__controlBtn btn btn-primary">Chọn tất cả</button>
    <button onclick="deselectAll()" class="table__controlBtn btn btn-primary">Bỏ chọn tất cả</button>
    <button onclick="deleteSelectedItems('AjaxDeleteListComment')" class="table__controlBtn btn btn-primary">Xóa các mục chọn</button> -->
    <a href="<?= admin_url('comments') ?>" class="btn btn-primary">Quay lại</a>
<!-- </div> -->

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-md-6 card card-danger">
        <div class="card-header">
          <h3 class="card-title">Sản Phẩm</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </section>
      <!-- DON HANG -->
      <section class="col-md-6 card card-danger">
        <div class="card-header">
          <h3 class="card-title">ĐƠN HÀNG</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="don_hang" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </section>
    </div>
    <!-- money -->
    <div class="col-md-12 card card-danger">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Doanh Thu</h3>
        </div>
        <div class="card-body">
          <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        </section>
      </div>
    </div>


    <script>
      // sarn pham
      $(function() {
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
          labels: [
            <?php foreach ($is_variant as $v) { ?> '<?= intval($v['is_variant']) == 0 ? "Sản Phẩm Biến Thể" : "Sản Phẩm Không Biến Thể" ?>',
            <?php } ?>
          ],
          datasets: [{
            data: [
              <?php foreach ($is_variant as $c) {
                $quantity = quantity_variant($c['is_variant']);
              ?>
                <?= count($quantity) ?>,
              <?php } ?>
            ],

            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }, ]
        }
        var donutOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
      })
      //hoa don
      $(function() {
        var donutChartCanvas = $('#don_hang').get(0).getContext('2d')
        var donutData = {
          labels: [
            <?php foreach ($count_cate as $cate) { ?> '<?= $cate['category_name'] ?>',
            <?php } ?>
          ],
          datasets: [{
            data: [
              <?php foreach ($count_cate as $category) {
                $quantity_order = count_order_by_cate($category['category_id']);
              ?>
                <?= count($quantity_order) ?>,
              <?php } ?>
            ],

            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }, ]
        }
        var donutOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }
        new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
      })
      //money 
      var listTitle = <?= json_encode($listDays) ?>;
      var listData = <?= json_encode($listMoney) ?>;
    </script>
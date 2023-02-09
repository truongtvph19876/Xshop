<div class="row" id="categories">
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Danh mục</h4>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>
                <div class="form-check form-check-muted m-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </th>
              <th> STT </th>
              <th> ID Danh mục </th>
              <th> Tên Danh mục </th>
              <th> <a class="btn btn-primary" href="index.php?act=adddm" >Thêm Danh mục</a> </th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $stt = 0;
              foreach($categories as $cate):
                $stt++;
                extract($cate);
                $edit = 'index.php?act=updatedm&id='. $id;
                $delete = 'index.php?act=deletedm&id='.$id;
            ?>
            <tr>
              <td>
                <div class="form-check form-check-muted m-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
              <td>
                <?php echo $stt?>
              </td>
              <td>
                <?php echo $id?>
              </td>
              <td>
                <?php echo $name?>
              </td>
              <td>
                <a class="btn btn-success mx-1" href="<?php echo $edit?>">Edit</a>
              
                <a class="btn btn-danger mx-1" href="<?php echo $delete?>">Delete</a>
              </td>
            </tr>
            <?php 
              endforeach;
              unset($stt);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

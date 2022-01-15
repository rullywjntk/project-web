<?php
include 'koneksi.php';
if (isset($_POST['search'])) {

    $maxContent = 8;
    $pages = $_GET['page'];
    if (empty($pages)) {
        $position = 0;
        $pages = 1;
    } else {
        $position = ($pages - 1) * $maxContent;
    }

    $no = $position + 1;


    $search = $_POST['search'];

    $sql = mysqli_query($connect, "SELECT * FROM place WHERE name_place like '%$search%' LIMIT $position, $maxContent");
    while ($result = mysqli_fetch_array($sql)) {
?>
        <div class="col">

            <div class="p-2 shadow rounded-slide position-relative" style="height: 30rem;">
                <img src="<?= $result['place_image'] ?>" class="card-img-top p-2 rounded-slide " alt="..." style="border-top-right-radius:20px; border-top-left-radius:20px">
                <div class="card-body">
                    <a href="detail-data.php?id=<?= $result['id_place'] ?>" class="text-decoration-none text-black mb-3 fs-5 card-title text-truncate pb-2"><?= $result['name_place'] ?></a>
                    <p class="text-secondary text-truncate" style="font-size: 12px;"><?= $result['location_place'] ?></p>
                    <p class="body-text"><?= $result['desc_place'] ?></p>
                    <a href="<?= $result['map'] ?>" class="text-decoration-none text-secondary text-end fa-md bottom-0 position-absolute mb-4 hover-item"><i class="fas fa-map-marker text-primary me-2"></i>Show Map</a>
                    <i class="far fa-heart  position-absolute fa-2x mb-4 me-3 text-secondary bottom-0 end-0"></i>

                </div>
            </div>

        </div>

    <?php $no++;
    }


    $query2 = mysqli_query($connect, "SELECT * FROM place WHERE id_category=$id");
    $total = mysqli_num_rows($query2);
    $totalPages = ceil($total / $maxContent);
    ?>

    <nav aria-label="Page navigation example mb-5">
        <ul class="pagination justify-content-center mt-5">

            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i != $pages) {
                    echo "<li class='page-item'><a class='page-link' href='category.php?id=$id&page=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>

        </ul>
    </nav>
<?php

}

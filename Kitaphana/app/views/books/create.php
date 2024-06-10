<?php
   require __DIR__ .  '/../Contents/header.php';
?>

<div class="container py-2">
<a href="index.php">Back to Book</a>
<div class="row my-3">
<form method="post" enctype="multipart/form-data" action="index.php?action=create">
    <div class=" mb-3">
        <input type="text" class="form-control form-control-sm " placeholder="Kitabyň ady" aria-label="ady"
            name="ady" required>
    </div>
    <div class=" mb-3">
        <input type="text" class="form-control form-control-sm " placeholder="Kitabyň awtory"
            aria-label="awtory" name="awtory" required>
    </div>
    <div class=" mb-3">
        <select class="form-select form-select-sm" id="inputGroupSelect01" name="gornusi">
            <option selected>saýla ...</option>
            <option value="1" class="text-primary">One</option>
            <option value="2" class="text-primary">Two</option>
            <option value="3" class="text-primary">Three</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control form-control-sm " placeholder="Senesi" aria-label="sene"
            name="yyly" required>
    </div>
        <!-- <label for="image">Select image to upload:</label> -->
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
        <br><br>
        <input type="file" name="pdf" accept="application/pdf">
        <input type="submit" value="Upload PDF" name="submit">
</form>
</div>
    <!-- <div class="row my-3">
        <h3>Regstration books</h3>
        <div class="col-md-12">
            <a href="" class="btn btn-secondary  m-1">Ahli kitaplar</a>
            <a href="" class="btn btn-secondary  m-1">Atalyk kitaplar</a>
            <a href="" class="btn btn-secondary  m-1">Turkmen edebiyaty</a>
            <a href="" class="btn btn-secondary  m-1">Dunya edebiyaty</a>
            <a href="" class="btn btn-secondary  m-1">Prezident kitaplar</a>
        </div>
    </div> -->
    <!-- <div class="row">
        <div class="col-md-12">
            <?php
                    if (isset($alert))
                    { ?>
            <div class="alert alert-<?php echo $alert["status"];?>">
                <?php echo $alert["message"]; ?>
            </div>
            <?php }
                ?>
        </div>
    </div> -->
    <!-- <div class="row my-4">
        <form action="index.php?action=create" method="post" enctype="multipart/form-data">
            <div class=" mb-3">
                <input type="text" class="form-control form-control-sm " placeholder="Kitabyň ady" aria-label="ady"
                    name="ady" required>
            </div>
            <div class=" mb-3">
                <input type="text" class="form-control form-control-sm " placeholder="Kitabyň awtory"
                    aria-label="awtory" name="awtory" required>
            </div>
            <div class=" mb-3">
                <select class="form-select form-select-sm" id="inputGroupSelect01" name="gornusi">
                    <option selected>saýla ...</option>
                    <option value="1" class="text-primary">One</option>
                    <option value="2" class="text-primary">Two</option>
                    <option value="3" class="text-primary">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control form-control-sm " placeholder="Senesi" aria-label="sene"
                    name="yyly" required>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <label for="inputGroupFile01" class="input-group-text bg-danger text-white">
                        Kitabyň daşky suraty JPG:
                    </label>
                    <input type="file" class="form-control form-control-sm visually-hidden" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" onchange="updateFileName(this)">
                    <span class="form-control bg-light text-secondary" id="fileNameDisplay" name="surat" required>Surat
                        saýlaň
                        (.jpg)</span>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <label for="inputGroupFile01" class="input-group-text bg-danger text-white">
                        Kitap maglumaty PDF:
                    </label>
                    <input type="file" class="form-control form-control-sm visually-hidden" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" onchange="updateFileName(this)">
                    <span class="form-control  bg-light text-secondary" id="fileNameDisplay" name="pdf" required>Kitap
                        saýlaň
                        (.pdf)</span>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" value="Kabul et" class="btn btn-primary w-25">
                <input type="reset" value="Arassala" class="btn btn-secondary w-25">
            </div>
        </form>
    </div> -->
</div>

<?php
   require __DIR__ .  '/../Contents/footer.php';
?>
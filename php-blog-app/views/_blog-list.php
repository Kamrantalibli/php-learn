<?php foreach ($films as $id => $film): ?>
    <div class="card mb-3">
        <div class="row">
            <div class="col-3">
                <img class="img-fluid" src="img/<?php echo $film["image"] ;?>">
            </div>
            <div class="col-9">
                <div class="card-body">
                    <h5 class="card-title"><a href="<?php echo $film["url"] ;?>"><?php echo $film["title"] ;?></a></h5>
                    <p class="card-text"><?php echo shortDescription($film["description"],100); ?></p>
                    <div>
                        <?php if($film["commentcount"] > 0): ?>
                            <span class="badge bg-primary me-1"><?php echo $film["commentcount"] ;?> comments</span>
                        <?php endif; ?>

                        <span class="badge bg-primary me-1"><?php echo $film["likecount"] ;?> likes</span>
                        <span class="badge bg-warning me-1">
                            <?php if($film["vision"]): ?> 
                                <span>In Vision</span>
                            <?php else: ?>
                                <span>Not in Vision</span>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php
if (!isset($total_pages)) {
    $total_pages = ceil($nbr_lignes / $articles_par_page);
}

if ($total_pages > 1): ?>
    <div class="col-12 d-flex justify-content-center mt-5 mb-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php // Previous Page
                    if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link shadow-sm" href="<?php echo $page_url; ?>page=<?php echo ($page - 1); ?>"
                            aria-label="Précédent">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                // Range of links
                $range = 2;
                $initial_num = max(1, $page - $range);
                $condition_limit_num = min($total_pages, $page + $range);

                if ($initial_num > 1): ?>
                    <li class="page-item"><a class="page-link shadow-sm" href="<?php echo $page_url; ?>page=1">1</a></li>
                    <?php if ($initial_num > 2): ?>
                        <li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php for ($x = $initial_num; $x <= $condition_limit_num; $x++): ?>
                    <li class="page-item <?php echo ($x == $page) ? 'active' : ''; ?>">
                        <a class="page-link shadow-sm" href="<?php echo ($x == $page) ? '#' : $page_url . 'page=' . $x; ?>">
                            <?php echo $x; ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <?php if ($condition_limit_num < $total_pages): ?>
                    <?php if ($condition_limit_num < $total_pages - 1): ?>
                        <li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>
                    <?php endif; ?>
                    <li class="page-item"><a class="page-link shadow-sm"
                            href="<?php echo $page_url; ?>page=<?php echo $total_pages; ?>">
                            <?php echo $total_pages; ?>
                        </a></li>
                <?php endif; ?>

                <?php // Next Page
                    if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link shadow-sm" href="<?php echo $page_url; ?>page=<?php echo ($page + 1); ?>"
                            aria-label="Suivant">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
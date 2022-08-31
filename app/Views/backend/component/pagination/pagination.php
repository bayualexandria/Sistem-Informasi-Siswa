<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation example">
    <ul class="flex list-style-none gap-x-1">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-md text-gray-800 hover:text-gray-800 focus:shadow-none">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item rounded-md shadow-md transition duration-300 <?= ($link['active']) ? 'bg-primary text-white pointer-events-none' : ' bg-slate-300 text-primary hover:text-white hover:bg-primary' ?>">
                <a <?= ($link['active']) ? '' : 'href=' . $link['uri'] . ''; ?> class="page-link relative block py-1.5 px-3 outline-none overflow-hidden">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="page-link relative block py-1.5 px-3 rounded-md border-0 bg-transparent outline-none transition-all duration-300  text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        <?php endif ?>
    </ul>
</nav>
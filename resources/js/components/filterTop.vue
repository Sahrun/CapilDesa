<template>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="multi-filter-select_length">
                <label>Show
                    <select name="multi-filter-select_length" aria-controls="multi-filter-select" class="form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> entries</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div id="multi-filter-select_filter" class="dataTables_filter">
                <label>Search:
                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="multi-filter-select">
                </label>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

    }
</script>
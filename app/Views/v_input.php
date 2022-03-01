<style>
    .input-group{
        width: 500px !important;
        position: fixed;
        top: 50%;
        left: 40%;
        margin-top: -50px;
        margin-left: -100px;
    }

    .btn-outline-secondary{
        color: black !important;
        background-color: white !important;
    }

    body {
        background-color: #F5DEB3 !important;
    }
</style>

<form action="<?php echo base_url() . '/Report/process'?>" method="POST">
    <div class="input-group">
        <select class="form-select" aria-label="Default select example" id='cluster' name='cluster'>
            <option selected>Cluster</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
        <input id='score' name='score' class="form-control" type="text" placeholder="Score input" aria-label="default input example">
        <button type="submit" class="btn btn-success"> Submit </button>
    </div>
</form>

<template>
    <div class="container">
        <form>
            <div class="form-group row">
                <label for="name" class="col-6 col-form-label col-form-label-lg">Name</label>
                <div class="col-6">
                    <input type="email" class="form-control form-control-lg" id="name">
                </div>
                <label for="email" class="col-6 col-form-label col-form-label-lg">E-mail Address</label>
                <div class="col-6">
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="you@example.com">
                </div>
                <label for="password" class="col-6 col-form-label col-form-label-lg">Password</label>
                <div class="col-6">
                    <input type="email" class="form-control form-control-lg" id="password">
                </div>
                <label for="confirm-password" class="col-6 col-form-label col-form-label-lg">Confirm password</label>
                <div class="col-6">
                    <input type="email" class="form-control form-control-lg" id="confirm-password">
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "UserCreateComponent"
    }
</script>

<style scoped>

</style>


/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function(){
    /**
     * 编辑 按钮
     */
    $(".edit").click(function(event){
        event.preventDefault();
        window.location.href = $(this).attr('href') + '?listPage=' + listPage;
    });

    /**
     * 删除 按钮
     */
    $(".delete").click(function (event){
        event.preventDefault();
        $("#delete-form").attr("action",$(this).attr('href'));
        $('#delete-model').modal();
    });

    /**
     * 模态框 确认删除 按钮
     */
    $(".confirm-delete").click(function(){
        $("#delete-form").submit();
    });

    /**
     * 模态框 取消删除 按钮
     */
    $(".cancel-delete").click(function(){
        $("#delete-form").attr("action",'');
        $('#delete-model').modal('hide');
    });

    /**
     * 模态框 确认离开页面 按钮
     */
    $(".cancel").click(function(){
        window.location.href = $(this).attr('href');
        return false;
    });

    /**
     * 提交 按钮
     */
    $(".submit").click(function(event){
        event.preventDefault();
        $("#submit-form").submit();
    });
});

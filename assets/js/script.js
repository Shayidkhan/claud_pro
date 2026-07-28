$(document).ready(function () {

    // Load Employee List
    loadData();

    // ===========================
    // SAVE
    // ===========================

    $("#saveBtn").click(function () {

        var formData = $("#employeeForm").serialize();

        formData += "&action=save";

        $.ajax({

            url: "save.php",

            type: "POST",

            data: formData,

            dataType: "json",

            success: function (response) {

                alert(response.message);

                if (response.status) {

                    $("#employeeForm")[0].reset();

                    loadData();

                }

            }

        });

    });


    // ===========================
    // UPDATE
    // ===========================

    $("#updateBtn").click(function () {

        var formData = $("#employeeForm").serialize();

        formData += "&action=update";

        $.ajax({

            url: "save.php",

            type: "POST",

            data: formData,

            dataType: "json",

            success: function (response) {

                alert(response.message);

                if (response.status) {

                    $("#employeeForm")[0].reset();

                    $("#saveBtn").show();

                    $("#updateBtn").hide();

                    loadData();

                }

            }

        });

    });



    // ===========================
    // SEARCH MOBILE
    // ===========================

    $("#btnSearch").click(function () {

        var phone = $("#searchPhone").val();

        $.ajax({

            url: "search.php",

            type: "POST",

            data: {

                phone: phone

            },

            dataType: "json",

            success: function (data) {

                if (data.status == false) {

                    alert(data.message);

                    return;

                }

                $("#id").val(data.id);

                $("#emp_date").val(data.emp_date);

                $("#emp_type").val(data.emp_type);

                $("#status").val(data.status);

                $("#emp_id").val(data.emp_id);

                $("#name").val(data.name);

                $("#phone").val(data.phone);

                $("#email").val(data.email);

                $("#location").val(data.location);

                $("#availability").val(data.availability);

                $("#note").val(data.note);

                $("#saveBtn").hide();

                $("#updateBtn").show();

            }

        });

    });



    // ===========================
    // DELETE
    // ===========================

    $(document).on("click", ".deleteBtn", function () {

        if (!confirm("Delete this employee?")) {

            return;

        }

        var id = $(this).data("id");

        $.ajax({

            url: "save.php",

            type: "POST",

            data: {

                action: "delete",

                id: id

            },

            dataType: "json",

            success: function (response) {

                alert(response.message);

                loadData();

            }

        });

    });




    // ===========================
    // EDIT
    // ===========================

    $(document).on("click", ".editBtn", function () {

        var id = $(this).data("id");

        $.ajax({

            url: "search.php",

            type: "POST",

            data: {

                id: id

            },

            dataType: "json",

            success: function (data) {

                $("#id").val(data.id);

                $("#emp_date").val(data.emp_date);

                $("#emp_type").val(data.emp_type);

                $("#status").val(data.status);

                $("#emp_id").val(data.emp_id);

                $("#name").val(data.name);

                $("#phone").val(data.phone);

                $("#email").val(data.email);

                $("#location").val(data.location);

                $("#availability").val(data.availability);

                $("#note").val(data.note);

                $("html, body").animate({

                    scrollTop: 0

                }, 500);

                $("#saveBtn").hide();

                $("#updateBtn").show();

            }

        });

    });



    // ===========================
    // LOAD TABLE
    // ===========================

    function loadData() {

        $("#employeeTable").load("load_data.php");

    }

});
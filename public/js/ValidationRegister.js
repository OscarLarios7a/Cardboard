$(document).ready(function() {
    $('#FormRegister').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The title is required'
                        },
                        stringLength: {
                            max: 200,
                            message: 'The title must be less than 200 characters long'
                        }
                    }
                },
                lastname: {
                    validators: {
                        notEmpty: {
                            message: 'The title is required'
                        },
                        stringLength: {
                            max: 200,
                            message: 'The title must be less than 200 characters long'
                        }
                    }
                },
                Genre: {
                    validators: {
                        notEmpty: {
                            message: 'The title is required'
                        },
                        stringLength: {
                            max: 200,
                            message: 'The title must be less than 200 characters long'
                        }
                    }
                },
                date_birth: {
                    validators: {
                        notEmpty: {
                            message: 'The date of birth is required'
                        },
                        date: {
                            format: 'YYYY/MM/DD',
                            message: 'The date of birth is not valid'
                        }
                    }
                },
                nickname: {
                    validators: {
                        notEmpty: {
                            message: 'The title is required'
                        },
                        stringLength: {
                            max: 200,
                            message: 'The title must be less than 200 characters long'
                        }
                    }
                },
                password: {
                    validators: {
                        identical: {
                            field: 'password_confirmation',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                Group: {
                    validators: {
                        notEmpty: {
                            message: 'The title is required'
                        },
                        stringLength: {
                            max: 200,
                            message: 'The title must be less than 200 characters long'
                        }
                    }
                },

            }
        }).on('err.field.fv', function(e, data) {
            // $(e.target)  --> The field element
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element
            // Hide the messages
            data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide();
        }).find('[name="date_birth"]')
        .datepicker({
            dateForm: 'YYYY/MM/DD',
            changeMonth: true,
            changeYear: true,
            yearRange: "1901:2017",
            onSelect: function(date, inst) {
                /* Revalidate the field when choosing it from the datepicker */
                $('#FormRegister').formValidation('revalidateField', 'date_birth');
            }
        });
});
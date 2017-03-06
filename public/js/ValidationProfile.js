$(document).ready(function() {
    $('#UpdateInfo').formValidation({
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
               // $('#FormRegister').formValidation('revalidateField', 'date_birth');
            }
        });


        
    var titleValidators = {
            row: '.col-md-4', // The title is placed inside a <div class="col-xs-4"> element
            validators: {
                notEmpty: {
                    message: 'The title is required'
                }
            }
        },
        descriptionValidators = {
            row: '.col-md-4',
            validators: {
                notEmpty: {
                    message: 'The ISBN is required'
                },

            }
        },
        bookIndex = 0;

    $('#AdditionalInfo')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':hidden',
            fields: {
                //'book[0].title': titleValidators,
                //'book[0].Description': descriptionValidators,
                'title[]': {
                    // The task is placed inside a .col-xs-6 element
                    row: '.col-md-4',
                    validators: {
                        notEmpty: {
                            message: 'The task is required'
                        }
                    }
                },
                'description[]': {
                    // The task is placed inside a .col-xs-6 element
                    row: '.col-md-4',
                    validators: {
                        notEmpty: {
                            message: 'The task is required'
                        }
                    }
                },

            }
        })
        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#bookTemplate'),
                $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
            // Add new fields
            // Note that we DO NOT need to pass the set of validators
            // because the new field has the same name with the original one
            // which its validators are already set
            $('#AdditionalInfo').formValidation('addField', $clone.find('[name="title[]"]')).formValidation('addField', $clone.find('[name="description[]"]'))
        })
        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row = $(this).closest('.form-group');
            // Remove fields
            $('#AdditionalInfo').formValidation('removeField', $row.find('[name="title[]"]')).formValidation('removeField', $row.find('[name="description[]"]'));
            // Remove element containing the fields
            $row.remove();
        });
}).on('err.field.fv', function(e, data) {
    // $(e.target)  --> The field element
    // data.fv      --> The FormValidation instance
    // data.field   --> The field name
    // data.element --> The field element
    // Hide the messages
    data.element.data('fv.messages').find('.help-block[data-fv-for="' + data.field + '"]').hide();
});
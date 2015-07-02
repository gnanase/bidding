
	         $(function() {
	        
	                /* @custom validation method (smartCaptcha) 
	                ------------------------------------------------------------------ */
	                    
	                $.validator.methods.smartCaptcha = function(value, element, param) {
	                        return value == param;
	                };
	                        
	                $( "#useradd" ).validate({
		                
                        /* @validation states + elements 
                        ------------------------------------------- */
                        
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        
                        /* @validation rules 
                        ------------------------------------------ */
                            
                        rules: {
                        	name: {
                                required: true
                         	},
                         	password: {
                                required: true
                         	},
                     		email: {
                         		required: true,
                         		email: true
                 			},
                 			address: {
                                required: true
                            },
                            role: {
                                required: true
                            }
                        },
                        
                        /* @validation error messages 
                        ---------------------------------------------- */
                        messages:{
                        	name: {
                                 required: 'Enter name'
                         	},
                         	password: {
                                 required: 'Enter password'
                         	},
                         	email: {
                         		required: 'Enter email address',
                         		email: 'Enter a valid email address'
                 			},
                 			phone: {
                             	required: 'Enter phone number'
                     		},
                    		role: {
                                required: 'Select role'
                            }  
                        },

                        /* @validation highlighting + error placement  
                        ---------------------------------------------------- */ 
                        
                        highlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                           if (element.is(":radio") || element.is(":checkbox")) {
                                    element.closest('.option-group').after(error);
                           } else {
                                    error.insertAfter(element.parent());
                           }
                        }        
                });     
      

	                        
	                $( "#productadd" ).validate({
	                
	                        /* @validation states + elements 
	                        ------------------------------------------- */
	                        
	                        errorClass: "state-error",
	                        validClass: "state-success",
	                        errorElement: "em",
	                        
	                        /* @validation rules 
	                        ------------------------------------------ */
	                            
	                        rules: {
	                        	name: {
	                                required: true
	                         	},
	                         	code: {
	                                required: true
	                         	},
	                         	desc: {
	                         		required: true
	                 			},
	                         	min_price: {
	                                required: true
	                         	},
	                         	bid_fee: {
	                         		required: true
	                 			},
	                 			pimage: {
	                         		required: true
	                 			},
	                 			intervel: {
	                         		required: true
	                 			}
	                        },
	                        
	                        /* @validation error messages 
	                        ---------------------------------------------- */
	                        messages:{
	                        	name: {
	                                 required: 'Enter product name'
	                         	},
	                         	code: {
	                                 required: 'Enter code'
	                         	},
	                         	desc: {
	                         		required: 'Enter description'
	                 			},
	                         	min_price: {
	                                 required: 'Enter minimum price'
	                         	},
	                         	bid_fee: {
	                         		required: 'Enter bid fee'
	                 			},
	                 			pimage: {
	                         		required: 'Upload product image'
	                 			},
	                 			intervel: {
	                         		required: 'Enter intervel'
	                 			}
	                        },
	
	                        /* @validation highlighting + error placement  
	                        ---------------------------------------------------- */ 
	                        
	                        highlight: function(element, errorClass, validClass) {
	                                $(element).closest('.field').addClass(errorClass).removeClass(validClass);
	                        },
	                        unhighlight: function(element, errorClass, validClass) {
	                                $(element).closest('.field').removeClass(errorClass).addClass(validClass);
	                        },
	                        errorPlacement: function(error, element) {
	                           if (element.is(":radio") || element.is(":checkbox")) {
	                                    element.closest('.option-group').after(error);
	                           } else {
	                                    error.insertAfter(element.parent());
	                           }
	                        }        
	                });     
	                
	                
	        });
	
	         function isNumber(evt) {
	        	 evt = (evt) ? evt : window.event;
	        	 var charCode = (evt.which) ? evt.which : evt.keyCode;
	        	 if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        	 return false;
	        	 }
	        	 return true;
	        	 }
	        
	         $(function () {
	 	        //Date range picker with time picker
	 	        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm'});
	 	        //Timepicker
	 	        $(".timepicker").timepicker({
	 	          showInputs: false
	 	        });
	 	      });
	         


	         
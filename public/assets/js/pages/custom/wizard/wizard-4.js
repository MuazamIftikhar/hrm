"use strict";

// Class definition
var KTWizard4 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			_validations[wizard.getStep() - 1].validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});

			_wizard.stop();  // Don't go to the next step
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    name: {
						validators: {
							notEmpty: {
								message: 'First name is required'
							}
						}
					},
                    lastName: {
						validators: {
							notEmpty: {
								message: 'Last Name is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
                    DOJ: {
						validators: {
							notEmpty: {
								message: 'Date of joining is required'
							},
						}
					},
					DOB: {
						validators: {
							notEmpty: {
								message: 'Date of joining is required'
							},
						}
					},
					confirmationDate: {
						validators: {
							notEmpty: {
								message: 'Confirmation Date is required'
							},
						}
					}, Gender: {
						validators: {
							notEmpty: {
								message: 'Gender is required'
							},
						}
					}, employmentType: {
						validators: {
							notEmpty: {
								message: 'Employment Type is required'
							},
						}
					}, Department: {
						validators: {
							notEmpty: {
								message: 'Department is required'
							},
						}
					}, shift: {
						validators: {
							notEmpty: {
								message: 'shift is required'
							},
						}
					}, leave: {
						validators: {
							notEmpty: {
								message: 'leave of joining is required'
							},
						}
					}, Nationality: {
						validators: {
							notEmpty: {
								message: 'Nationality is required'
							},
						}
					}, Designation: {
						validators: {
							notEmpty: {
								message: 'Designation is required'
							},
						}
					}, Religion: {
						validators: {
							notEmpty: {
								message: 'Religion is required'
							},
						}
					}, Race: {
						validators: {
							notEmpty: {
								message: 'Race is required'
							},
						}
					}, supervisorName: {
						validators: {
							notEmpty: {
								message: 'Supervisor Name is required'
							},
						}
					}, bloodGroup: {
						validators: {
							notEmpty: {
								message: 'Blood Group is required'
							},
						}
					}, POB: {
						validators: {
							notEmpty: {
								message: 'Place of Birth is required'
							},
						}
					}, Identification: {
						validators: {
							notEmpty: {
								message: 'Identification is required'
							},
						}
					}, picture: {
						validators: {
							notEmpty: {
								message: 'Picture is required'
							},
						}
					}, Number: {
						validators: {
							notEmpty: {
								message: 'Number is required'
							},
						}
					}, Address: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							},
						}
					}, Country: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							},
						}
					},
                    Postal: {
						validators: {
							notEmpty: {
								message: 'Postal is required'
							},
						}
					}, Skill: {
						validators: {
							notEmpty: {
								message: 'Skill is required'
							},
						}
					}, Frequency: {
						validators: {
							notEmpty: {
								message: 'Frequency is required'
							},
						}
					}, basicPay: {
						validators: {
							notEmpty: {
								message: 'Basic Pay is required'
							},
						}
					}, contactName: {
						validators: {
							notEmpty: {
								message: 'Contact Name is required'
							},
						}
					}, Relationship: {
						validators: {
							notEmpty: {
								message: 'Relationship is required'
							},
						}
					},
                    contactNumber: {
						validators: {
							notEmpty: {
								message: 'Contact Number is required'
							},
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    fatherName: {
						validators: {
							notEmpty: {
								message: 'Father Name is required'
							}
						}
					},fatherID: {
						validators: {
							notEmpty: {
								message: 'Father ID is required'
							}
						}
					},
					motherName: {
						validators: {
							notEmpty: {
								message: 'Mother Name is required'
							}
						}
					},motherID: {
						validators: {
							notEmpty: {
								message: 'Mother ID is required'
							}
						}
					},spouseName: {
						validators: {
							notEmpty: {
								message: 'spouse Name is required'
							}
						}
					},spouseID: {
						validators: {
							notEmpty: {
								message: 'spouseID is required'
							}
						}
					},childName: {
						validators: {
							notEmpty: {
								message: ' child Name is required'
							}
						}
					}, childID: {
						validators: {
							notEmpty: {
								message: 'child ID is required'
							}
						}
					},childTwoName: {
						validators: {
							notEmpty: {
								message: 'child Two Name is required'
							}
						}
					},childTwoID: {
						validators: {
							notEmpty: {
								message: 'child Two ID is required'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    payMode: {
						validators: {
							notEmpty: {
								message: 'Pay Mode is required'
							}
						}
					},Bank: {
						validators: {
							notEmpty: {
								message: 'Bank is required'
							}
						}
					},
                    Code: {
						validators: {
							notEmpty: {
								message: 'Code is required'
							}
						}
					}, accountNumber: {
						validators: {
							notEmpty: {
								message: 'Account Number is required'
							}
						}
					},
                    branchCode: {
						validators: {
							notEmpty: {
								message: 'Branch Code is required'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    Remarks: {
						validators: {
							notEmpty: {
								message: 'Remarks is required'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v4');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard4.init();
});

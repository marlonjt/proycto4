import { Component, OnInit } from '@angular/core';
import { JobBoardServiceService } from '../../../../services/job-board/job-board-service.service';
import { Professional } from '../../../../models/job-board/models.index';
import { ProfessionalExperience } from '../../../../models/job-board/models.index';
import { ConfirmationService, MessageService, SelectItem } from 'primeng/api';
import { NgxSpinnerService } from 'ngx-spinner';
import { Validators, FormControl, FormGroup, FormBuilder } from '@angular/forms';
import { Catalogue } from 'src/app/models/ignug/catalogue';
import { State } from 'src/app/models/ignug/state';
import { IgnugServiceService } from 'src/app/services/ignug/ignug-service.service';
import { AuthenticationServiceService } from 'src/app/services/authentication/authentication-service.service';
import { User } from 'src/app/models/authentication/user';
@Component({
    selector: 'app-app-professional-experience',
    templateUrl: './app-professional-experience.component.html',
})
export class AppProfessionalExperienceComponent implements OnInit {
    displayProfessionalExperience: boolean; // para visualizar el modal nuevo usuario - modificiar usuario
    professinals:SelectItem[];
    position: string; 
    employer: string;
    job_description:string;
    reason_leave:string;
    current_work:boolean;
    
    selectedProfessionalExperience: ProfessionalExperience; // para guardar el usuario seleccionado o para poder editar la informacion
    professionalExperience: Array<ProfessionalExperience>; // para almacenar el listado de todos los usuarios
    colsProfessionalExperience: any[]; // para almacenar las columnas para la tabla usuarios
    headerProfessionalExperience: string; // para cambiar de forma dinamica la cabecear del  modal de creacion o actualizacion de usuario
    professionalExperienceForm: FormGroup;
    validationStart_date: string;
    validationFinish_date: string;

    constructor(private messageService: MessageService,
                private jobBoardService: JobBoardServiceService,
                private spinnerService: NgxSpinnerService,
                private confirmationService: ConfirmationService,
                private fb: FormBuilder) {
        this.buildFormProfessionalExperience();
        this.selectedProfessionalExperience = new ProfessionalExperience();
        this.professionalExperience = new Array<ProfessionalExperience>();
        this.colsProfessionalExperience = [
            {field: 'professional', header: 'Profesional'},
            {field: 'position', header: 'Cargo'},
            {field: 'job_descripcion', header: 'Descripcion del Cargo'},
            {field: 'reason_leave', header: 'Razon de Salida'},
            {field: 'start_date', header: 'Fecha inicio'},
            {field: 'end_date', header: 'Fecha finalizada'},
        ];
        const currentDate = new Date();
        this.validationStart_date = (currentDate.getFullYear() - 70).toString() + ':' + currentDate.getFullYear().toString();
        this.validationFinish_date = (currentDate.getFullYear() - 70).toString() + ':' + currentDate.getFullYear().toString();
    }

    buildFormProfessionalExperience() {
        this.professionalExperienceForm = this.fb.group({
            position: ['', Validators.required],
            employer: ['', Validators.required],
            job_description: ['', Validators.required],
            reason_leave: ['', Validators.required],
            start_date:['', Validators.required],
            end_date:['', Validators.required],
            current_work:['', Validators.required],
        });
    }

    // Esta funcion se ejectuta apenas inicie el componente
    ngOnInit(): void {
        this.getprofessionalExperience();
        
    }
    
    getprofessionalExperience() {
     
        this.spinnerService.show();
        this.jobBoardService.get('professional_experiences?limit=9&page=1&field=id&order=ASC&user_id=1').subscribe(
            response => { 
                this.spinnerService.hide();
                this.professionalExperience = response['professionalExperiences']['data'][0]['professional_experiences'];
                console.log (this.professionalExperience)
            }, error => {
                this.spinnerService.hide();
                this.messageService.add({
                    key: 'tst',
                    severity: 'error',
                    summary: 'Oops! Problemas con el servidor',
                    detail: 'Vuelve a intentar más tarde',
                    life: 5000
                });
            });
    }

    createProfessionalExperience() {
        this.selectedProfessionalExperience = this.getProfessionalExperience();
        this.spinnerService.show();
        console.log({'user': { 'id': 1 },'ProfessionalExperience': this.selectedProfessionalExperience})
        this.jobBoardService.post('professional_experiences', {'user': { 'id': 1 },'professionalExperience': this.selectedProfessionalExperience}).subscribe(
            response => {
                this.professionalExperience.unshift(this.selectedProfessionalExperience);

                this.spinnerService.hide();
                this.messageService.add({
                    key: 'tst',
                    severity: 'success',
                    summary: 'Se creó correctamente',
                    detail: this.selectedProfessionalExperience.employer + '',
                    life: 3000
                });
                this.displayProfessionalExperience = false;
            }, error => {
                this.spinnerService.hide();
                this.messageService.add({
                    key: 'tst',
                    severity: 'error',
                    summary: 'Oops! Problemas con el servidor',
                    detail: 'Vuelve a intentar más tarde',
                    life: 5000
                });
            });
    }

    updateProfessionalExperience() {
        this.selectedProfessionalExperience = this.getProfessionalExperience();
        this.spinnerService.show();
        this.jobBoardService.update('professional_experiences', {'user': { 'id': 1 }, 'ProfessionalExperience': this.selectedProfessionalExperience}).subscribe(
            response => {
                this.spinnerService.hide();
                this.messageService.add({
                    key: 'tst',
                    severity: 'success',
                    summary: 'Se actualizó correctamente',
                    detail: this.selectedProfessionalExperience.position + ' ' + this.selectedProfessionalExperience.employer,
                    life: 3000
                });
                this.displayProfessionalExperience = false;
            }, error => {
                this.spinnerService.hide();
                this.messageService.add({
                    key: 'tst',
                    severity: 'error',
                    summary: 'Oops! Problemas con el servidor',
                    detail: 'Vuelve a intentar más tarde',
                    life: 5000
                });
            });
    }

    deleteProfessionalExperience(professionalExperience: ProfessionalExperience) {
        this.confirmationService.confirm({
            header: 'Eliminar ',
            message: '¿Estás seguro de eliminar?',
            acceptButtonStyleClass: 'ui-button-danger',
            rejectButtonStyleClass: 'ui-button-primary',
            icon: 'pi pi-trash',
            accept: () => {
                this.spinnerService.show();
                this.jobBoardService.delete('professional_experiences/' + professionalExperience.id).subscribe(
                    response => {
                        const indiceProfessionalExperience = this.professionalExperience
                            .findIndex(element => element.id === professionalExperience.id);
                        this.professionalExperience.splice(indiceProfessionalExperience, 1);
                        this.spinnerService.hide();
                        this.messageService.add({
                            key: 'tst',
                            severity: 'success',
                            summary: 'Se eliminó correctamente',
                            life: 3000
                        });
                    }, error => {
                        this.spinnerService.hide();
                        this.messageService.add({
                            key: 'tst',
                            severity: 'error',
                            summary: 'Oops! Problemas con el servidor',
                            detail: 'Vuelve a intentar más tarde',
                            life: 5000
                        });
                    });
            }
        });
    }

    selectProfessionalExperience(professionalExperience :ProfessionalExperience): void {
        if (professionalExperience) {
            this.selectedProfessionalExperience = professionalExperience;

            this.professionalExperienceForm.controls['employer'].setValue(professionalExperience.employer);
            this.professionalExperienceForm.controls['position'].setValue(professionalExperience.position);
            // this.professionalExperienceForm.controls['start_date'].setValue(professionalExperience.start_date);
            // this.professionalExperienceForm.controls['end_date'].setValue(professionalExperience.finish_date);
            // this.professionalExperienceForm.controls['current_work'].setValue(professionalExperience.current_work);
            this.professionalExperienceForm.controls['job_description'].setValue(professionalExperience.job_description);
            this.professionalExperienceForm.controls['reason_leave'].setValue(professionalExperience.reason_leave);

            this.headerProfessionalExperience = 'Modificar Experiencias Profesionales';
        } else {
            //this.selectedProfessionalExperience = new ProfessionalExperience ();
            this.professionalExperienceForm.reset();
            this.headerProfessionalExperience = 'Nueva Expreciencia Profesional';
        }
        this.displayProfessionalExperience = true;
    }

    getProfessionalExperience(): ProfessionalExperience {
        return {
            //professional:{ id:  this.professionalExperienceForm.controls['professional'].value },
            position:  this.professionalExperienceForm.controls['position'].value,
            employer: this.professionalExperienceForm.controls['employer'].value,
            job_description:  this.professionalExperienceForm.controls['position'].value,
            reason_leave: this.professionalExperienceForm.controls['reason_leave'].value,
            start_date:  this.professionalExperienceForm.controls['start_date'].value,
            end_date: this.professionalExperienceForm.controls['end_date'].value,
            current_work: this.professionalExperienceForm.controls['current_work'].value,
            
        } as ProfessionalExperience;
    }

    onSubmitProfessionalExperience(event: Event) {
        event.preventDefault();
        if (this.professionalExperienceForm.valid) {
            if( this.headerProfessionalExperience == 'Modificar Experiencias Profesionales' ) {
                this.updateProfessionalExperience();
            } else if( this.headerProfessionalExperience == 'Nueva Expreciencia Profesional' ) {
                this.createProfessionalExperience();
            }
        } else {
            this.professionalExperienceForm.markAllAsTouched();
        }

    }
   
}



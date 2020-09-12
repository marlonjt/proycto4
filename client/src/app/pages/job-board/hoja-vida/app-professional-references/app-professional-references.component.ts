import {Component, OnInit} from '@angular/core';
import {Professional} from '../../../../models/job-board/models.index';
import {ConfirmationService, MessageService, SelectItem} from 'primeng/api';
import {AuthenticationServiceService} from '../../../../services/authentication/authentication-service.service';
import {NgxSpinnerService} from 'ngx-spinner';
import { JobBoardServiceService} from '../../../../services/job-board/job-board-service.service';
import {Validators, FormControl, FormGroup, FormBuilder} from '@angular/forms';
import {ProfessionalReferences } from 'src/app/models/job-board/models.index';

@Component({
  selector: 'app-app-professional-references',
  templateUrl: './app-professional-references.component.html'
})
export class AppProfessionalReferencesComponent implements OnInit {
  displayProfessionalReference: boolean; // para visualizar el modal nuevo usuario - modificiar usuario
  position: SelectItem[]; // para almacenar el catalogo de las etnias
  typeCertifications: SelectItem[]; // para almacenar el catalogo de las los cantones
  selectedProfessionalReference: ProfessionalReferences; // para guardar el usuario seleccionado o para poder editar la informacion
  professionalReferences: Array<ProfessionalReferences>; // para almacenar el listado de todos los usuarios
  institutions: SelectItem[];
  colsProfessionalReference: any[]; // para almacenar las columnas para la tabla usuarios
  headerDialogProfessionalReference: string; // para cambiar de forma dinamica la cabecear del  modal de creacion o actualizacion de usuario
  professionalReferenceForm: FormGroup;
  validationBirthdate: string;
  validationPhone: string;
  validationStart_date: string;
  validationFinish_date: string;

  constructor(private messageService: MessageService,
              private jobBoardService: JobBoardServiceService,
              private spinnerService: NgxSpinnerService,
              private confirmationService: ConfirmationService,
              private fb: FormBuilder) {
      this.buildFormProfessionalReference();
      //this.selectedProfessionalReference = new ProfessionalReference();
      this.professionalReferences = new Array<ProfessionalReferences>();
      this.colsProfessionalReference = [
          {field: 'institution', header: 'Institución'},
          {field: 'position', header: 'Cargo'},
          {field: 'contact', header: 'Contactos'},
          {field: 'phone', header: 'telefono'},
      
      ];
  }

  buildFormProfessionalReference() {
      this.professionalReferenceForm = this.fb.group({
          institution: ['', Validators.required],
          position: ['', Validators.required],
          contact: ['', Validators.required],
          phone: ['', Validators.required],
      });
  }

  // Esta funcion se ejectuta apenas inicie el componente
  ngOnInit(): void {
      this.getProfessionalReferences();
      this.getInstitutions();  
  }

  // obtiene la lista del catalogo de tipo de evento
  /*getEventTypes(): void {
      const parameters = '?type=event_type';
      this.jobBoardService.get('catalogues' + parameters).subscribe(
          response => {
              const eventTypes = response['data']['catalogues'];
              this.eventTypes = [{label: 'Seleccione', value: ''}];
              eventTypes.forEach(item => {
                  this.eventTypes.push({label: item.name, value: item.id});
              });

          }, error => {
              this.messageService.add({
                  key: 'tst',
                  severity: 'error',
                  summary: 'Oops! Problemas al cargar el catálogo Etninas',
                  detail: 'Vuelve a intentar más tarde',
                  life: 5000
              });
          });
  }*/

  getInstitutions(): void {
      const parameters = '?type=career';
      this.jobBoardService.get('catalogues' + parameters).subscribe(
          response => {
              const institution = response['data']['catalogues'];
              this.institutions = [{label: 'Seleccione', value: ''}];
              institution.forEach(item => {
                  this.institutions.push({label: item.name, value: item.id});
              });

          }, error => {
              this.messageService.add({
                  key: 'tst',
                  severity: 'error',
                  summary: 'Oops! Problemas al cargar el catálogo Tipos de Instituciones',
                  detail: 'Vuelve a intentar más tarde',
                  life: 5000
              });
          });
  }

  getTypeCertifications(): void {
      const parameters = '?type=type_certification';
      this.jobBoardService.get('catalogues' + parameters).subscribe(
          response => {
              const typeCertifications = response['data']['catalogues'];
              this.typeCertifications = [{label: 'Seleccione', value: ''}];
              typeCertifications.forEach(item => {
                  this.typeCertifications.push({label: item.name, value: item.id});
              });

          }, error => {
              this.messageService.add({
                  key: 'tst',
                  severity: 'error',
                  summary: 'Oops! Problemas al cargar el catálogo Tipos de Documentos',
                  detail: 'Vuelve a intentar más tarde',
                  life: 5000
              });
          });
  }

  getProfessionalReferences() {
   
      this.spinnerService.show();
      this.jobBoardService.get('professional_references?limit=9&page=1&field=id&order=ASC&user_id=1').subscribe(
          response => { 
              this.spinnerService.hide();
              this.professionalReferences = response['professionalReferences']['data'][0]['professional_references'];
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

  createProfessionalReference() {
      this.selectedProfessionalReference = this.getProfessionalReference();
      this.spinnerService.show();
      console.log({'user': { 'id': 1 },'professionalReference': this.selectedProfessionalReference})
      this.jobBoardService.post('professional_references', {'user': { 'id': 1 },'professionalReference': this.selectedProfessionalReference}).subscribe(
          response => {
              this.professionalReferences.unshift(this.selectedProfessionalReference);

              this.spinnerService.hide();
              this.messageService.add({
                  key: 'tst',
                  severity: 'success',
                  summary: 'Se creó correctamente',
                  detail: this.selectedProfessionalReference.institution.name,
                  life: 3000
              });
              this.displayProfessionalReference = false;
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

  updateProfessionalReference() {
      this.selectedProfessionalReference = this.getProfessionalReference();
      this.spinnerService.show();
      this.jobBoardService.update('professional_references', {'user': { 'id': 1 }, 'professionalReference': this.selectedProfessionalReference}).subscribe(
          response => {
              this.spinnerService.hide();
              this.messageService.add({
                  key: 'tst',
                  severity: 'success',
                  summary: 'Se actualizó correctamente',
                  detail: this.selectedProfessionalReference.institution.name,
                  life: 3000
              });
              this.displayProfessionalReference = false;
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

  deleteProfessionalReference(professionalReference: ProfessionalReferences) {
      this.confirmationService.confirm({
          header: 'Eliminar ',
          message: '¿Estás seguro de eliminar?',
          acceptButtonStyleClass: 'ui-button-danger',
          rejectButtonStyleClass: 'ui-button-primary',
          icon: 'pi pi-trash',
          accept: () => {
              this.spinnerService.show();
              this.jobBoardService.delete('professional_references/' + professionalReference.id).subscribe(
                  response => {
                      const indiceProfessionalReference = this.professionalReferences
                          .findIndex(element => element.id === professionalReference.id);
                      this.professionalReferences.splice(indiceProfessionalReference, 1);
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

  selectProfessionalReference(professionalReference :ProfessionalReferences): void {
      if (professionalReference) {
          this.selectedProfessionalReference = professionalReference;
          this.professionalReferenceForm.controls['institution'].setValue(professionalReference.institution.name);
          this.professionalReferenceForm.controls['position'].setValue(professionalReference.position);
          this.professionalReferenceForm.controls['contact'].setValue(professionalReference.contact);
          this.professionalReferenceForm.controls['phone'].setValue(professionalReference.phone);
          this.headerDialogProfessionalReference = 'Modificar Referencias Profesionales';
      } else {
          //this.selectedProfessionalReference = new ProfessionalReference();
          this.professionalReferenceForm.reset();
          this.headerDialogProfessionalReference = 'Nueva Referencia';
      }
      this.displayProfessionalReference = true;
  }

  getProfessionalReference(): ProfessionalReferences {
      return {
          institution:{ id:  this.professionalReferenceForm.controls['institution'].value },
          position:  this.professionalReferenceForm.controls['position'].value,
          contact: this.professionalReferenceForm.controls['contact'].value,
          phone: this.professionalReferenceForm.controls['phone'].value,
          
      } as ProfessionalReferences;
  }

  onSubmitProfessionalReference(event: Event) {
      event.preventDefault();
      if (this.professionalReferenceForm.valid) {
          if( this.headerDialogProfessionalReference = 'Modificar Referencias Profesionales' ) {
              this.updateProfessionalReference();
          } else {
              this.createProfessionalReference();
          }
      } else {
          this.professionalReferenceForm.markAllAsTouched();
      }

  }
}

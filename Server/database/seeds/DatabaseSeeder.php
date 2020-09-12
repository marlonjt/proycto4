<?php

use Illuminate\Database\Seeder;
use App\Models\Ignug\State;
use App\Models\Attendance\Catalogue as AttendanceCatalogue;
use App\Models\Ignug\Catalogue as IgnugCatalogue;
use App\Role;
use App\User;
use App\Models\Ignug\Teacher;
use App\Models\Ignug\Institution;
use App\Models\JobBoard\Professional;
use App\Models\JobBoard\AcademicFormation;
use App\Models\JobBoard\Course;
use App\Models\JobBoard\ProfessionalReference;
use App\Models\JobBoard\ProfessionalExperience;
use App\Models\JobBoard\Language;
use App\Models\JobBoard\Ability;
use App\Models\JobBoard\Category;
use App\Models\JobBoard\Company;
use App\Models\JobBoard\Offer;
use App\Models\JobBoard\Catalogue as JobBoardCatalogue;
use App\Models\JobBoard\Location as JobBoardLocation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // States
        factory(State::class)->create([
            'code' => '1',
            'name' => 'ACTIVE',
            'state' => 1,
        ]);
        factory(State::class)->create([
            'code' => '2',
            'name' => 'INACTIVE',
            'state' => 1,
        ]);
        factory(State::class)->create([
            'code' => '3',
            'name' => 'DELETED',
            'state' => 1,
        ]);

        // Catalogues
        // Workday Principal
        factory(AttendanceCatalogue::class)->create([
            'code' => 'work',
            'name' => 'Jornada',
            'type' => 'workdays.principal',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);

        // Workday Secundary
        factory(AttendanceCatalogue::class)->create([
            'code' => 'lunch',
            'name' => 'Almuerzo',
            'type' => 'workdays.secondary',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);

        // Task Processes
        factory(AttendanceCatalogue::class)->create([
            'code' => 'academic',
            'name' => 'ACADEMICO',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'code' => 'administrative',
            'name' => 'ADMINISTRATIVO',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'code' => 'entailment',
            'name' => 'VINCULACION',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'code' => 'investigation',
            'name' => 'INVESTIGACION',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);

        // Task Subprocesses academic
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '1',
            'name' => 'IMPARTIR CLASES PRESENCIALES, VIRTUALES O EN LINEA',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '2',
            'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '3',
            'name' => 'DISEÑO Y ELABORACION DE GUIAS, MATERIAL DIDACTICO Y SYLLABUS',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '4',
            'name' => 'ORIENTACION Y ACOMPAÑAMIENTO A TRAVES DE TUTORIAS PRESENCIALES O VIRTUALES, INDIVIDUALES O GRUPALES',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '5',
            'name' => 'ELABORACION DE REPORTES DE NIVEL ACADEMICO REFERENTE A EVALUACIONES, TRABAJOS Y RENDIMIENTO DEL ESTUDIANTE',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '6',
            'name' => 'VISITAS DE CAMPO',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '7',
            'name' => 'PREPARACION, ELABORACION, APLICACION Y CALIFICACION DE EXAMENES Y  PRACTICAS ',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);

        // Task Subprocesses administrative
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 4,
            'code' => '1',
            'name' => 'PARTICIPACION EN PROCESOS DEL SISTEMA NACIONAL DE EVALUACION PARA INGRESO A UNIVERSIDADES',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 4,
            'code' => '2',
            'name' => 'ACTIVIDADES DE DIRECCION O GESTION EN SUS DISTINTOS NIVELES DE ORGANIZACION ACADEMICA E INSTITUCIONAL',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 4,
            'code' => '3',
            'name' => 'REUNIONES DE ORGANO COLEGIADO SUPERIOR',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 4,
            'code' => '4',
            'name' => 'DISEÑO DE PROYECTOS DE CARRERAS Y PROGRAMAS DE ESTUDIOS',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 4,
            'code' => '5',
            'name' => 'ACTIVIDADES RELACIONADAS CON LA EVALUACION INSTITUCIONAL EXTERNA',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);

        // Task Subprocesses entailment
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 5,
            'code' => '1',
            'name' => 'DIRECCION SEGUIMIENTO Y EVALUACION DE PRACTICAS PRE PROFESIONALES',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 5,
            'code' => '2',
            'name' => 'DISEÑO E IMPARTICION DE CURSOS DE EDUCACION CONTINUA O DE CAPACITACION Y ACTUALIZACION',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 5,
            'code' => '3',
            'name' => 'PARTICIPACION EN ACTIVIDADES DE PROYECTOS SOCIALES, ARTISTICOS, PRODUCTIVOS Y EMPRESARIALES DE VINCULACION CON LA SOCIEDAD',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 5,
            'code' => '4',
            'name' => 'ELABORACION DE INFORMES DE SEGUIMIENTO DE PROYECTOS DE VINCULACION',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);

        // Task Subprocesses investigation
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 6,
            'code' => '1',
            'name' => 'GESTIONAR PROYECTOS DE INVESTIGACION, COMUNITARIOS Y/O DE EMPRENDIMIENTO',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '2',
            'name' => 'DIRECCION Y TUTORIAS PARA LA ELABORACION DE TRABAJOS PARA LA OBTENCION DE TITULO',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '3',
            'name' => 'DIRECCION Y PARTICIPACION DE PROYECTOS DE INVESTIGACION E INNOVACION BASICA, APLICADA, TECNOLOGICA',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 6,
            'code' => '4',
            'name' => 'REALIZACION DE INVESTIGACION PARA LA RECUPERACION, FORTALECIMIENTO Y POTENCIAC ION DE LOS SABERES ANCESTRALES',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 6,
            'code' => '5',
            'name' => 'PARTICIPACION EN CONGRESOS, SEMINARIOS Y CONFERENCIAS PARA LA PRESENTACION DE AVANCES Y RESULTADOS DE SUS INVESTIGACIONES',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 6,
            'code' => '6',
            'name' => 'DISEÑO, GESTION Y PARTICIPACION EN REDES Y PROGRAMAS DE INVESTIGACION LOCAL NACIONAL E INTERNACIONAL',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 6,
            'code' => '7',
            'name' => 'PARTICIPACION EN COMITES O CONSEJOS ACADEMICOS Y EDITORIALES DE REVISTAS CIENTIFICAS Y ACADEMICAS INDEXADAS, Y DE ALTO IMPACTO CIENTIFICO O ACADEMICO',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(AttendanceCatalogue::class)->create([
            'parent_code_id' => 6,
            'code' => '8',
            'name' => 'DIFUSION DE RESULTADOS Y BENEFICIOS SOCIALES DE LA INVESTIGACION, A TRAVES DE PUBLICACIONES, PRODUCCIONES ARTISTICAS, ACTUACIONES, CONCIERTOS, CREACION U ORGANIZACION DE INSTALACIONES Y DE EXPOSICIONES, ENTRE OTROS',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);

        // Ethnic origin
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'INDIGENA',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'AFROECUATORIANO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '3',
            'name' => 'NEGRO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '4',
            'name' => 'MULATO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '5',
            'name' => 'MONTUBIO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '6',
            'name' => 'MESTIZO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '7',
            'name' => 'BLANCO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '8',
            'name' => 'OTRO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '9',
            'name' => 'NO REGISTRA',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);

        // Sex
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'HOMBRE',
            'type' => 'sex',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'MUJER',
            'type' => 'sex',
            'state_id' => 1,
        ]);
        // Gender
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'MASCULINO',
            'type' => 'gender',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'FEMENINO',
            'type' => 'gender',
            'state_id' => 1,
        ]);

        // Indetification Type
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'CEDULA',
            'type' => 'identification_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'PASAPORTE',
            'type' => 'identification_type',
            'state_id' => 1,
        ]);

        // Blood Type
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'A+',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'A-',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '3',
            'name' => 'B+',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '4',
            'name' => 'B-',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '5',
            'name' => 'AB+',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '6',
            'name' => 'AB-',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '7',
            'name' => 'O+',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '8',
            'name' => 'O-',
            'type' => 'blood_type',
            'state_id' => 1,
        ]);

        // career modality
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'PRESENCIAL',
            'type' => 'career_modality',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'SEMI-PRESENCIAL',
            'type' => 'career_modality',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '3',
            'name' => 'DISTANCIA',
            'type' => 'career_modality',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '4',
            'name' => 'DUAL',
            'type' => 'career_modality',
            'state_id' => 1,
        ]);

        // career type
        factory(IgnugCatalogue::class)->create([
            'code' => '1',
            'name' => 'TECNICATURA',
            'type' => 'career_type',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'code' => '2',
            'name' => 'TECNOLOGIA',
            'type' => 'career_type',
            'state_id' => 1,
        ]);

        // location
        factory(IgnugCatalogue::class)->create([
            'code' => 'ec',
            'name' => 'ECUADOR',
            'type' => 'country',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'parent_code_id' => 30,
            'code' => '17',
            'name' => 'PICHINCHA',
            'type' => 'province',
            'state_id' => 1,
        ]);
        factory(IgnugCatalogue::class)->create([
            'parent_code_id' => 30,
            'code' => '1',
            'name' => 'QUITO',
            'type' => 'canton',
            'state_id' => 1,
        ]);

        // roles system
        factory(IgnugCatalogue::class)->create([
            'code' => 'attendance',
            'name' => 'Attendance',
            'type' => 'system',
            'state_id' => 1,
        ]);

        factory(Role::class)->create([
            'code' => '1',
            'name' => 'DOCENTE',
            'system_id' => 1,
            'state_id' => 1,
        ]);
        factory(Role::class)->create([
            'code' => '2',
            'name' => 'ADMINISTRATIVO',
            'system_id' => 1,
            'state_id' => 1,
        ]);

                //Category
        //Career
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'A',
            'name' => 'EDUCACION',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'B',
            'name' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'C',
            'name' => 'ADMINISTRACION',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'D',
            'name' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'E',
            'name' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'F',
            'name' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'G',
            'name' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'H',
            'name' => 'SALUD Y BIENESTAR',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => null,
            'code' => 'I',
            'name' => 'SERVICIOS',
            'type' => 'career',
            'icon' => 'pi-angle-down',
            'state_id' => 1
        ]);

        //Professional degree

        factory(Category::class)->create([
            'parent_code_id' => 1,
            'code' => 'EDUCACION',
            'name' => 'ASISTENTE PEDAGOGICO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 1,
            'code' => 'EDUCACION',
            'name' => 'ASISTENTE EN EDUCACION INCLUSIVA CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR Y CONDUCTOR DE RADIO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR Y CONDUCTOR DE TELEVISION CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR RADIOFONICO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR RADIAL COMUNITARIO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR EN COMUNICACION AUDIOVISUAL CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR EN TELEVISION COMUNITARIA CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR EN MULTIMEDIA CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR DE SONIDO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'LOCUTOR CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'PRODUCTOR DE MEDIOS IMPRESOS CON NIVEL EQUIVALENTE A TECNOLOGOSUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'COMUNICADOR DIGITAL CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'GRAFOLOGO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'TECNOLOGO SUPERIOR EN CRIMINALISTICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 2,
            'code' => 'CIENCIAS SOCIALES, PERIODISMO E INFORMACION',
            'name' => 'TECNOLOGO SUPERIOR EN CRIMINOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN TRIBUTACION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN AUDITORIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN CONTABILIDAD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN SEGUROS Y RIESGOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN ADMINISTRACION FINANCIERA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR EN ADMINISTRACION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN ADMINISTRACION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN GESTION DEL PATRIMONIO HISTORICO CULTURAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN GESTION DE OPERACIONES TURISTICAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN GESTION PUBLICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN MARKETING',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN PUBLICIDAD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR EN OPERACION DE CENTRALES TELEFONICAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN PROMOCION CULTURAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR SUPERIOR EN ASISTENCIA ADMINISTRATIVA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN ASISTENCIA ADMINISTRATIVA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR EN SECRETARIADO EJECUTIVO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN SECRETARIADO EJECUTIVO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR EN VENTAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN VENTAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN COMERCIO EXTERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR EN BIENES RAICES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN BIENES RAICES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNICO SUPERIOR EN GESTION DE PRODUCCION Y SERVICIOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN GESTION DE PRODUCCION Y SERVICIOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN GESTION DEL TALENTO HUMANO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 3,
            'code' => 'ADMINISTRACION',
            'name' => 'TECNOLOGO SUPERIOR EN FORMACION OCUPACIONAL POR COMPETENCIAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNOLOGO SUPERIOR EN BIOTECNOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNICO SUPERIOR EN PROTECCION DEL MEDIO AMBIENTE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNOLOGO SUPERIOR EN PROTECCION DEL MEDIO AMBIENTE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNICO SUPERIOR EN DESARROLLO AMBIENTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNOLOGO SUPERIOR EN DESARROLLO AMBIENTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNOLOGO SUPERIOR EN PROMOCION DE ENERGIAS RENOVABLES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TECNOLOGO SUPERIOR FORESTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'GUARDAPARQUES CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'TOPOGRAFO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 4,
            'code' => 'CIENCIAS NATURALES, MATEMATICAS Y ESTADISTICA',
            'name' => 'ANALISTA DE SUELOS CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNICO SUPERIOR EN ENSAMBLAJE Y MANTENIMIENTO DE EQUIPOS DE COMPUTO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN ENSAMBLAJE Y MANTENIMIENTO DE EQUIPOS DE COMPUTO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNICO SUPERIOR EN GESTION DE BASES DE DATOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN DISEÑO Y GESTION DE BASE DE DATOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNICO SUPERIOR EN INSTALACION Y MANTENIMIENTO DE REDES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN DISEÑO Y MANTENIMIENTO DE REDES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNICO SUPERIOR EN REDES Y TELECOMUNICACIONES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN REDES Y TELECOMUNICACIONES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN DESARROLLO DE SOFTWARE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'AUDITOR DE SISTEMAS CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'AUDITOR DE SISTEMAS CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN DESARROLLO DE APLICACIONES MOVILES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNOLOGO SUPERIOR EN DESARROLLO DE APLICACIONES WEB',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 5,
            'code' => 'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACION (TIC)',
            'name' => 'TECNICO SUPERIOR EN MANTENIMIENTO DE SOFTWARE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN POLIMEROS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN QUIMICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MEDICION Y MONITOREO AMBIENTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN TRATAMIENTO DE DESECHOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ELECTRICIDAD Y POTENCIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ELECTRICIDAD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ENERGIAS ALTERNATIVAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN MANTENIMIENTO ELECTRICO Y CONTROL INDUSTRIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MANTENIMIENTO ELECTRICO Y CONTROL INDUSTRIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ELECTRONICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ELECTROMECANICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ELECTROMECANICA AUTOMOTRIZ',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN AUTOMATIZACION E INSTRUMENTACION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN AUTOMATIZACION E INSTRUMENTACION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN ELECTRONICA EN INSTRUMENTACION AVIONICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ELECTRONICA EN INSTRUMENTACION AVIONICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN TELEMATICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN TELEMATICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN SOLDADURA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN ENDEREZADA Y PINTURA AUTOMOTRIZ',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN METALMECANICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN METALMECANICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MECANICA AERONAUTICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN MECANICA NAVAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MECANICA NAVAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN MECANICA AUTOMOTRIZ',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MECANICA AUTOMOTRIZ',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN MECANICA INDUSTRIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MECANICA INDUSTRIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN REFRIGERACION Y AIRE ACONDICIONADO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MANTENIMIENTO MECANICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN MANTENIMIENTO MECANICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN SISTEMAS DE INYECCION A GASOLINA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN SISTEMAS DE INYECCION A DIESEL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MANTENIMIENTO Y REPARACION DE MOTORES A DIESEL Y GASOLINA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MECATRONICA AUTOMOTRIZ',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PROCESAMIENTO DE ALIMENTOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN ENOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PROCESAMIENTO INDUSTRIAL DE LA MADERA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'CARPINTERO CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'CARPINTERO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PROCESAMIENTO INDUSTRIAL DEL VIDRIO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PROCESAMIENTO INDUSTRIAL DEL PLASTICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PROCESAMIENTO DE CUERO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PRODUCCION TEXTIL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN FABRICACION DE CALZADO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN CONFECCION TEXTIL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PETROLEOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MINERIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN PRODUCCION INDUSTRIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN MECANICA Y OPERACION DE MAQUINAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MECANICA Y OPERACION DE MAQUINAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN IMPRESION OFFSET Y ACABADOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN GESTION DE LA CALIDAD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN MANTENIMIENTO Y SEGURIDAD INDUSTRIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN CATASTROS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNICO SUPERIOR EN OBRAS CIVILES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 6,
            'code' => 'INGENIERIA, INDUSTRIA Y CONSTRUCCION',
            'name' => 'TECNOLOGO SUPERIOR EN CONSTRUCCION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN PERMACULTURA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNICO SUPERIOR EN AGROECOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN AGROECOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNICO SUPERIOR EN PRODUCCION AGRICOLA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN PRODUCCION AGRICOLA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN PRODUCCION ANIMAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN PRODUCCION MADERERA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN PRODUCCION PECUARIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN FLORICULTURA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN FRUTICULTURA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN FLORI- FRUTICULTURA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN CUNICULTURA Y ESPECIES MENORES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNICO SUPERIOR EN MECANIZACION AGRICOLA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN MECANIZACION AGRICOLA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR FORESTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN ACUICULTURA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN NUTRICION ANIMAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 7,
            'code' => 'AGRICULTURA, SILVICULTURA, PESCA Y VETERINARIA',
            'name' => 'TECNOLOGO SUPERIOR EN CUIDADO CANINO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNICO SUPERIOR EN ODONTOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNICO SUPERIOR EN MECANICA DENTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNICO SUPERIOR EN LABORATORIO CLINICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN LABORATORIO CLINICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN EMERGENCIAS MEDICAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNICO SUPERIOR EN IMAGENOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN IMAGENOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNICO SUPERIOR EN REHABILITACION FISICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN REHABILITACION FISICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN ENFERMERIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN FARMACIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN PODOLOGIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN NATUROPATIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNICO SUPERIOR EN ATENCION PRIMARIA DE SALUD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN ATENCION INTEGRAL A ADULTOS MAYORES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 8,
            'code' => 'SALUD Y BIENESTAR',
            'name' => 'TECNOLOGO SUPERIOR EN DESARROLLO INFANTIL INTEGRAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);

        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN TRICOLOGIA Y COSMIATRIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'ASESOR DE IMAGEN CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN ESTETICA INTEGRAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN ESTETICA INTEGRAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'MAQUILLISTA PROFESIONAL CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN TANATOESTETICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN HOTELERIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN GASTRONOMIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN ARTE CULINARIO ECUATORIANO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN DIETETICA Y COCINA LIGHT',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN PANADERIA Y REPOSTERIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'GESTOR DE EVENTOS, FERIAS Y CONVENCIONES CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'ENTRENADOR DEPORTIVO CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'ENTRENADOR DEPORTIVO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'DIRECTOR TECNICO EN DEPORTES CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'DIRECTOR TECNICO EN DEPORTES CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN TURISMO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'GUIA NACIONAL DE TURISMO CON NIVEL EQUIVALENTE A TECNICO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'GUIA NACIONAL DE TURISMO CON NIVEL EQUIVALENTE A TECNOLOGO SUPERIOR',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN PLANIFICACION Y DESARROLLO DE PROYECTOS TURISTICOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SERVICIOS AEREOS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SALUBRIDAD Y MANEJO AMBIENTAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN SEGURIDAD INTEGRAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SEGURIDAD INTEGRAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN SEGURIDAD Y PREVENCION DE RIESGOS LABORALES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SEGURIDAD Y PREVENCION DE RIESGOS LABORALES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN SEGURIDAD E HIGIENE DEL TRABAJO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SEGURIDAD E HIGIENE DEL TRABAJO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN INTERPRETACION DE LENGUA DE SEÑAS',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN OPERACIONES DE RESCATE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN OPERACIONES DE RESCATE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN CIENCIAS MILITARES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN CIENCIAS MILITARES',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN SEGURIDAD CIUDADANA Y ORDEN PUBLICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SEGURIDAD CIUDADANA Y ORDEN PUBLICO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN INVESTIGACION DE ACCIDENTES DE TRANSITO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN INVESTIGACION DE ACCIDENTES DE TRANSITO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN SEGURIDAD PENITENCIARIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SEGURIDAD PENITENCIARIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN CIENCIAS DE LA SEGURIDAD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN CIENCIAS DE LA SEGURIDAD',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN SEGURIDAD ELECTRONICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN SEGURIDAD ELECTRONICA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN PLANIFICACION Y GESTION DEL TRANSITO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN PLANIFICACION Y GESTION DEL TRANSITO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN VIGILANCIA Y SEGURIDAD CIUDADANA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN VIGILANCIA Y SEGURIDAD CIUDADANA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN INVESTIGACIONES DE POLICIA JUDICIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN INVESTIGACIONES DE POLICIA JUDICIAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN LOGISTICA Y TRANSPORTE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN LOGISTICA Y TRANSPORTE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN LOGISTICA MULTIMODAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN LOGISTICA MULTIMODAL',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN LOGISTICA PORTUARIA',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN TRAFICO AEREO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN TRAFICO AEREO',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN PLANIFICACION Y GESTION DEL TRANSPORTE TERRESTRE',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNICO SUPERIOR EN LOGISTICA DE ALMACENAMIENTO Y DISTRIBUCION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        factory(Category::class)->create([
            'parent_code_id' => 9,
            'code' => 'SERVICIOS',
            'name' => 'TECNOLOGO SUPERIOR EN LOGISTICA DE ALMACENAMIENTO Y DISTRIBUCION',
            'type' => 'professional_degree',
            'icon' => '',
            'state_id' => 1
        ]);
        
        // Catalogue of career
        /*
        factory(JobBoardCatalogue::class)->create([
            'parent_code_id' => null,
            'code' => '5',
            'name' => 'TECNOLOGIA SUPERIOR EN DESARROLLO DE SOFTWARE',
            'type' => 'career',
            'icon' => '',
            'state_id' => 1,
        ]);
        factory(JobBoardCatalogue::class)->create([
            'parent_code_id' => null,
            'code' => '5',
            'name' => 'TECNOLOGIA SUPERIOR EN GESTION PUBLICA',
            'type' => 'career',
            'icon' => '',
            'state_id' => 1,
        ]);
        factory(JobBoardCatalogue::class)->create([
            'parent_code_id' => null,
            'code' => '5',
            'name' => 'TECNOLOGIA SUPERIOR EN MARKETING',
            'type' => 'career',
            'icon' => '',
            'state_id' => 1,
        ]);
            */
        //Catalogue of Institution
        factory(JobBoardCatalogue::class)->create([
            'parent_code_id' => null,
            'code' => '6',
            'name' => 'INSTITUTO SUPERIOR TECNOLOGICO COTOPAXI',
            'type' => 'career',
            'icon' => '',
            'state_id' => 1,
        ]);
        factory(JobBoardCatalogue::class)->create([
            'parent_code_id' => null,
            'code' => '6',
            'name' => 'INSTITUTO TECNOLOGICO SUPERIOR BENITO JUAREZ',
            'type' => 'career',
            'icon' => '',
            'state_id' => 1,
        ]);
        factory(JobBoardCatalogue::class)->create([
            'parent_code_id' => null,
            'code' => '6',
            'name' => 'INSTITUTO TECNOLOGICO SUPERIOR CENTRAL TECNICO',
            'type' => 'career',
            'icon' => '',
            'state_id' => 1,
        ]);

        //factory(Category::class, 100)->create();
        factory(JobBoardCatalogue::class, 100)->create();
        factory(JobBoardLocation::class, 100)->create();
        factory(User::class, 100)->create()->each(function ($user) {
            $user->teacher()->save(factory(Teacher::class)->make());
            $professional = $user->professional()->save(factory(Professional::class)->make());
            $professional->academicFormations()->save(factory(AcademicFormation::class)->make());
            $professional->abilities()->save(factory(Ability::class)->make());
            $professional->languages()->save(factory(Language::class)->make());
            $professional->courses()->save(factory(Course::class)->make());
            $professional->professionalExperiences()->save(factory(ProfessionalExperience::class)->make());
            $professional->professionalReferences()->save(factory(ProfessionalReference::class)->make());
            $user->roles()->attach(1);
        });
        factory(User::class, 100)->create()->each(function ($user) {
            $user->teacher()->save(factory(Teacher::class)->make());
            $company = $user->company()->save(factory(Company::class)->make());
            $offer = $company->offers()->save(factory(Offer::class)->make());
            $offer->categories()->attach(random_int(1, 100));
            $offer->professionals()->attach(random_int(1, 100));
            $company->professionals()->attach(random_int(1, 100));
            $user->roles()->attach(2);
        });
        // factory(App\Models\JobBoard::class, 10)->create();

        /*
            drop schema if exists authentication cascade;
            drop schema if exists attendance cascade;
            drop schema if exists ignug cascade;
            drop schema if exists job_board cascade;
            drop schema if exists web cascade;

            create schema authentication;
            create schema attendance;
            create schema ignug;
            create schema job_board;
            create schema web;
        */
    }
}

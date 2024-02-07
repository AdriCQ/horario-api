# API Schedule

## Instalación

Requiere PHP 8.2 o PHP 8.3 y Composer

1. Clonar Repo
2. Instalar dependencias

```sh
composer install
```
3. Crear variables de entorno

```sh
cp .env.example .env
```

4. Modificar credenciales de usuario en el fichero .env

```ts
USER_NAME=admin
USER_EMAIL=admin@user.com
USER_PASSWORD=password
```

5. Correr migraciones y poblar base de datos

```sh
php artisan migrate:fresh --seed
```

## Endpoints

```typescript
// Filtrar horarios
axios.get<Schedule[]>('horarios', {params: ScheduleFilter})

// Crear horario
axios.post<Schedule>('horarios', params: ScheduleCreate)

// Visualizar horario
axios.get<Schedule>(`horarios/${horarioId}`)

// Actualizar horario
axios.patch<Schedule>(`horarios/${horarioId}`, params: ScheduleUpdate)

// Eliminar horario
axios.delete(`horarios/${horarioId}`)

// Obtener usuario actual
axios.get<User>(`users`)

// Login
axios.post<AuthResponse>(`users/login`, params: UserLogin)
```

# Tipo de datos

```typescript
interface Schedule {
    id: number
    faculty: string
    career: string
    year: number
    content: unknown
}


interface ScheduleCreate {
    faculty: string
    career: string
    year: number
    content: unknown
}

type ScheduleUpdate = Partial<ScheduleCreate>

interface ScheduleFilter {
    faculty?: string
    career?: string
    year?: number
}

interface User {
    id: number
    name: string
    email: string
}


interface UserLogin {
    email: string
    password: string
}

interface AuthResponse {
    data: User
    auth_token: string
}
```

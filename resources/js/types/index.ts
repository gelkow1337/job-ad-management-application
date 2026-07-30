export * from './auth';

export interface User {
    id: number;
    name: string;
    email: string;
    company_id: number | null;
    company?: Company | null;
}

export interface Company {
    id: number;
    name: string;
    website: string;
    description: string;
    number_of_employees: number;
}

export interface JobListing {
    id: number;
    company_id: number;
    title: string;
    description: string;
    location: string | null;
    salary: string | null;
    company?: Company;
    categories?: Category[];
}

export interface Category {
    id: number;
    name: string;
}

export interface BreadCrumb {
    label: string;
    href?: string;
}

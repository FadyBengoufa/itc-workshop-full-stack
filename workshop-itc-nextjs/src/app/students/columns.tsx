"use client"

import { ColumnDef } from "@tanstack/react-table"

// This type is used to define the shape of our data.
// You can use a Zod schema here if you want.
export type Student = {
  id: string
  first_name: string
  last_name: string
  email: string
  gender: string
  address?: string
  phone_number?: string
  date_of_birth?: string
  major: string
  department: string
}

export const columns: ColumnDef<Student>[] = [
  {
    accessorKey: "first_name",
    header: "First Name",
  },
  {
    accessorKey: "last_name",
    header: "Last Name",
  },
  {
    accessorKey: "email",
    header: "Email",
  },
  {
    accessorKey: "gender",
    header: "Gender",
  },
  {
    accessorKey: "address",
    header: "Address",
  },
  {
    accessorKey: "phone_number",
    header: "Phone Number",
  },
  {
    accessorKey: "date_of_birth",
    header: "Date of Birth",
  },
  {
    accessorKey: "major",
    header: "Major",
  },
  {
    accessorKey: "department",
    header: "Department",
  },
]
import { columns } from "./columns";
import { DataTable } from "./data-table";

async function getData() {
  // TODO Fetch data from your API here.
  return [
    {
      id: "1",
      first_name: "Alice",
      last_name: "Johnson",
      email: "alice.johnson@example.com",
      gender: "Female",
      address: "123 Elm St, Springfield",
      phone_number: "555-1234",
      date_of_birth: "1995-06-15",
      major: "Computer Science",
      department: "Engineering",
    },
    {
      id: "2",
      first_name: "Bob",
      last_name: "Smith",
      email: "bob.smith@example.com",
      gender: "Male",
      address: "456 Oak St, Springfield",
      phone_number: "555-5678",
      date_of_birth: "1993-04-22",
      major: "Mathematics",
      department: "Science",
    },
    {
      id: "3",
      first_name: "Charlie",
      last_name: "Brown",
      email: "charlie.brown@example.com",
      gender: "Male",
      address: "789 Maple Ave, Springfield",
      phone_number: "555-8765",
      date_of_birth: "1992-01-10",
      major: "Physics",
      department: "Science",
    },
    {
      id: "4",
      first_name: "David",
      last_name: "Wilson",
      email: "david.wilson@example.com",
      gender: "Male",
      address: "101 Pine Rd, Springfield",
      phone_number: "555-2345",
      date_of_birth: "1990-11-30",
      major: "Chemistry",
      department: "Science",
    },
    {
      id: "5",
      first_name: "Ella",
      last_name: "Davis",
      email: "ella.davis@example.com",
      gender: "Female",
      address: "202 Birch Ln, Springfield",
      phone_number: "555-3456",
      date_of_birth: "1994-05-05",
      major: "Biology",
      department: "Science",
    },
    {
      id: "6",
      first_name: "Frank",
      last_name: "Miller",
      email: "frank.miller@example.com",
      gender: "Male",
      address: "303 Cedar St, Springfield",
      phone_number: "555-4567",
      date_of_birth: "1991-08-14",
      major: "Economics",
      department: "Business",
    },
    {
      id: "7",
      first_name: "Grace",
      last_name: "Lee",
      email: "grace.lee@example.com",
      gender: "Female",
      address: "404 Walnut Ave, Springfield",
      phone_number: "555-2346",
      date_of_birth: "1996-02-28",
      major: "History",
      department: "Arts",
    },
    {
      id: "8",
      first_name: "Hannah",
      last_name: "Clark",
      email: "hannah.clark@example.com",
      gender: "Female",
      address: "505 Chestnut St, Springfield",
      phone_number: "555-6789",
      date_of_birth: "1993-07-19",
      major: "Political Science",
      department: "Social Sciences",
    },
    {
      id: "9",
      first_name: "Ian",
      last_name: "Walker",
      email: "ian.walker@example.com",
      gender: "Male",
      address: "606 Poplar Rd, Springfield",
      phone_number: "555-7890",
      date_of_birth: "1992-03-16",
      major: "Philosophy",
      department: "Humanities",
    },
    {
      id: "10",
      first_name: "Jane",
      last_name: "Taylor",
      email: "jane.taylor@example.com",
      gender: "Female",
      address: "707 Sycamore Ln, Springfield",
      phone_number: "555-8901",
      date_of_birth: "1990-12-25",
      major: "Sociology",
      department: "Social Sciences",
    },
  ];
}

async function getStudentsData() {
  const response = await fetch("http://127.0.0.1:8000/api/students", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  });
  const data = await response.json();

  return data.data;
}

export default async function Home() {
  const data = await getData();
  const students = await getStudentsData();

  return (
    <div className="container mx-auto py-10">
      <DataTable columns={columns} data={data} />
    </div>
  );
}
